<footer class="content-info" id="footer">
  <div class="container">
    <div class="column">
      <p>
        <a class="logo" href="{{ home_url('/') }}" rel="home">@svg('logo', ['aria-hidden' => 'true'])<span class="screen-reader-text">{{ get_bloginfo('name', 'display') }}</span></a>
        <a class="logo logo--usfwc" href="https://usworker.coop/" rel="external">@svg('usfwc-logo', ['aria-hidden' => 'true'])<span class="screen-reader-text">{{ __('U.S. Federation of Worker Cooperatives', 'pcc') }}</span></a>
      </p>
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
    <div class="column">
      <p class="license">
        <a href="https://creativecommons.org/licenses/by-nc/3.0/">
          @svg('cc', ['aria-hidden' => 'true'])
          @svg('by', ['aria-hidden' => 'true'])
          @svg('nc', ['aria-hidden' => 'true'])
          <span class="screen-reader-text">{{ __('Creative Commons Attribution Non-Commercial 3.0 License', 'pcc') }}</span>
        </a>
      </p>
      <p>
        {!! sprintf(__('Except where otherwise noted, content on this site is licensed under a %s. Permissions beyond the scope of this license are available to cooperatives.', 'pcc'), sprintf('<a class="inherit" href="%1$s">%2$s</a>', 'https://creativecommons.org/licenses/by-nc/3.0/', __('Creative Commons Attribution Non-Commercial 3.0 License', 'pcc'))) !!}
      </p>
    </div>
  </div>
</footer>
