<footer class="content-info" id="footer">
  <div class="container">
    <div class="column">
      <p><a class="logo" href="{{ home_url('/') }}" rel="home">@svg('logo', ['aria-hidden' => 'true'])<span class="screen-reader-text">{{ get_bloginfo('name', 'display') }}</span></a>
      <nav class="nav-footer">
        @if (has_nav_menu('footer_navigation'))
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav']) !!}
        @endif
      </nav>
      <div class="content">
        <div class="wp-block-button is-style-secondary">
          <a class="wp-block-button__link" href="{{ $donate_link }}" rel="external">{{ __('Donate', 'pcc') }}</a>
        </div>
      </div>
    </div>
    <div class="column">
      <h2><a href="{{ $contact_link }}">{{ __('Contact us', 'pcc') }}</a></h2>
      <address>
        <p class="label">
          <strong>{{ __('Email', 'pcc') }}</strong>
        </p>
        <p>
          <a href="mailto:{!! antispambot('info@platform.coop') !!}" rel="external">{!! antispambot('info@platform.coop') !!}</a>
        </p>
        <p class="label">
          <strong>{{ __('Address', 'pcc') }}</strong>
        </p>
        {!! $mailing_address !!}
      </address>
    </div>
    <div class="column">
      <h2>{{ __('Sign up for community updates', 'pcc') }}</h2>
      {!! $signup_text !!}
      <div class="content">
        <div class="wp-block-button is-style-secondary">
          <a class="wp-block-button__link" href="{{ $signup_link }}" rel="external">{{ __('Sign up for updates', 'pcc') }}</a>
        </div>
      </div>
      <ul class="social">
        @foreach ($social_networks as $network => $details)
          <li><a class="social__link no-arrow" href="{!! $details['url'] !!}" rel="external">@svg($network, ['aria-hidden' => 'true'])<span class="screen-reader-text"> {{ ucfirst($network) }}</span></a></li>
        @endforeach
      </ul>
    </div>
  </div>
</footer>
