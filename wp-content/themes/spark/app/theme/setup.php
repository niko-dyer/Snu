<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;


/**
 * Theme assets
 */

add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('sage/main.css', asset_path(mix('/css/main.css')), false, null);

	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', [], null, false);
		wp_enqueue_style('sage/font-awesome.css', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', false, null);
	}

	wp_enqueue_script('sage/main.js', asset_path(mix('/js/main.js')), [], null, true);

	if (is_single() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// Deregister some base Gravity Forms styling, but keep the rest of their styles
	wp_dequeue_style('gforms_formsmain_css');
	wp_deregister_style('gforms_formsmain_css');
	wp_dequeue_style('gforms_ready_class_css');
	wp_deregister_style('gforms_ready_class_css');
}, 99);


/**
 * Theme setup
 */

add_action('after_setup_theme', function () {

    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */

    add_theme_support('soil-clean-up');
    add_theme_support('soil-disable-asset-versioning');
    //add_theme_support('soil-js-to-footer');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /** WooCommerce Support */
    //add_theme_support( 'woocommerce' );
    //add_theme_support( 'wc-product-gallery-zoom' );
    //add_theme_support( 'wc-product-gallery-lightbox' );
    //add_theme_support( 'wc-product-gallery-slider' );

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */

    add_theme_support('title-tag');


    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */

    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);


    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */

    add_theme_support('post-thumbnails');


    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */

    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);


    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */

    add_theme_support('customize-selective-refresh-widgets');


	/**
	 * Use admin stylesheet for visual editor
	 */

	add_editor_style(asset_path(mix('/css/admin.css')));


}, 20);

/**
 * Register sidebars
 */

add_action('widgets_init', function () {

    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];

    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);

    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);

	register_sidebar([
		'name'          => __('Products', 'sage'),
		'id'            => 'sidebar-products'
	] + $config);

});


/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */

add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});


/**
 * Setup Sage options
 */

add_action('after_setup_theme', function () {

    /**
     * Add JsonManifest to Sage container
     */

    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });


    /**
     * Add Blade to Sage container
     */

    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });


    /**
     * Create @asset() Blade directive
     */

    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });

});


/**
 * Define static upload image sizes
 */

add_image_size('thumbnail', 300, 300, false);
add_image_size('medium', 480, 480, false);
add_image_size('medium_large', 768, 768, false);
add_image_size('large', 1280, 1280, false);


/**
 * WordPress Admin stylesheet and javascript
 */

add_action('admin_enqueue_scripts', function () {
	wp_register_style('spark_admin_styles', asset_path(mix('/css/admin.css')), ['acf-input', 'acf-pro-input'], '1.0.0');
	wp_enqueue_style('spark_admin_styles');

	wp_enqueue_script('spark_admin_scripts', asset_path('js/admin.js'), [], null, true);
});


/**
 * WordPress Login stylesheet
 */

add_action('login_enqueue_scripts', function () {
	wp_register_style('custom_login_styles', asset_path(mix('/css/admin.css')), false, '1.0.0');
	wp_enqueue_style('custom_login_styles');
});


/**
 * Video Tutorials Admin Page
 */

function spark_tutorial_videos_menu_item() {
	add_submenu_page(
	  'index.php',                   // Parent Slug
	  'Tutorial Videos',             // Page Title
	  'Tutorial Videos',             // Menu Title
	  'edit_theme_options',          // Capability
	  'tutorial-videos',             // Menu Slug
	  __NAMESPACE__ . '\\spark_tutorial_videos_page',  // Callback
	  500                            // Position
	);

}

add_action( 'admin_menu', __NAMESPACE__ . '\\spark_tutorial_videos_menu_item' );

function spark_tutorial_videos_page() {
	// Change this $embed variable to the Youtube playlist iframe
	$embed = '<strong>Developer:</strong> Add the Youtube playlist embed iframe located in <code>spark/app/theme/setup.php</code>';

	echo "
<div id='tutorial-videos'>
	<h1>Tutorial Videos</h1>
	<div class='content'>
		<p>Hover over the video and click the <strong>Playlist Icon</strong> <span class='dashicons dashicons-playlist-video
'></span> to view the other videos in the playlist.</p>
		<div class='responsive-iframe'>$embed</div>			
	</div>
</div> 
	";
}
