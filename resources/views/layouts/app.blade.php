<!doctype html>
<html class="no-js" {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    <a class="skip-link" href="#main">{{ __('Skip to main content', 'platformcoop') }}</a>
    @if(function_exists('wp_body_open')) {{-- TODO: Remove this after WordPress 5.2 --}}
      @php wp_body_open() @endphp
    @endif
    @php do_action('get_header') @endphp
    @include('partials.header')
    <main id="main" class="main">
      @yield('content')
    </main>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
