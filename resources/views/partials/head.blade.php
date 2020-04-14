<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="{{ App\asset_path('images/favicon.png') }}" type="image/png">
  <link rel="shortcut icon" href="{{ App\asset_path('images/favicon.svg') }}" type="image/svg+xml">
  <script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>
  @if(is_page_template('views/page-contact-us.blade.php') || is_page('contact-us'))
    @if(function_exists('wpcf7_enqueue_scripts'))
        @php wpcf7_enqueue_scripts() @endphp
    @endif
  @endif
  @php wp_head() @endphp
</head>
