<?php

// If a local config file exists
if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
	// Use these settings on the local server
 	include( dirname( __FILE__ ) . '/wp-config-local.php' );
} else {
	// Otherwise use the settings below on staging/production
	define('WP_HOME', 'http://spark-sandbox.ftscorch.com');
	define('WP_SITEURL', WP_HOME);

	// ** MySQL settings ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'db_spark-sandbox');

	/** MySQL database username */
	define('DB_USER', 'forge');

	/** MySQL database password */
	define('DB_PASSWORD', '4S0acP0xO3YZM8T1kGnP');

	/** MySQL hostname */
	define('DB_HOST', 'localhost');

	/** Define the environment, for Roots/Sage */
	define('WP_ENV', 'production');
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don\'t change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         'Tb39ZKJktN/wgadTMRfK+4ULDqbbO6hDunoiQWqznx4pOwBNHgqG7xIYtI1KviNpyKO36eXMZQt3jbXxrFg4hQ==');
define('SECURE_AUTH_KEY',  'HuJTyT+8Edrr1srfk9U/aVAvMF3hgmHeurXhoyT2tMlNahqOKEhDx8jJ0iUTIAT1in8vVXVClFzaRIi//yTpgQ==');
define('LOGGED_IN_KEY',    'VHFeyL+cYScvmiKEgWeZGksLjd2GDNWZmqheTquHQXELNCuEUaFgbccVX6/6i5WyKzhe5hPQMN+TFiULm2g5gQ==');
define('NONCE_KEY',        'KmKd/Mg1eLHSEQ+Ffh2N7zVEx4irqdAMOC0N9PTgDivPxxlmpRMPjVmaofC2rkHG8RnpmfOCRuNCOoQpHOejdg==');
define('AUTH_SALT',        'zAKHXANvTJeDSYRh2yrAKfnSNc7K2aYNb5BLxXQ/rGSLCEB41fOmPGsuvQ5pFoOYjeRhPqqKkowTKL5xG7OSmw==');
define('SECURE_AUTH_SALT', 'Vs3SHOlStAG6U76cj4lG0FnKsh6q7FL7Jovp1dNvl2bNGEZjP2esSY0l8VVthCW6C+K8nXEG0aE7XeHDm2M8TQ==');
define('LOGGED_IN_SALT',   '9E8zEjtXiBRWhr91ulBzeQQJppnOcRnzFcuB326N9qe7kv3S9oHITcILLGvS5tqFwqlc/8T0+JOjTR/8G+wppA==');
define('NONCE_SALT',       't8VZhdsDZNEHfM8AkvAKkwSXhYiXWce9LcsxC2UXA1gqy440dhZi3bbTN6qk0hMyPWgbbdOCQuNMAzNIyrELxQ==');

$table_prefix = 'ft_';

define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'AUTOMATIC_UPDATER_DISABLED', false );
define( 'WP_AUTO_UPDATE_CORE', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
