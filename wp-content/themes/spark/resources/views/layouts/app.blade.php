<!doctype html>
<html {{ get_language_attributes() }}>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{ the_field('header_script_snippets', 'option') }}
    @php wp_head() @endphp
    @stack('head')
  </head>

  <body @php body_class() @endphp>
    {{ the_field('body_script_snippets', 'option') }}
    @stack('body')

    @include('global.nav')

    <main class="site {{ main_class() }}" id="site-main" role="document">
        @yield('content')
    </main>

    @include('global.footer')

    @php wp_footer() @endphp
    {{ the_field('footer_script_snippets', 'option') }}
    @stack('footer')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
  </body>
</html>
