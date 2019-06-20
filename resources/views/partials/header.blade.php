<header class="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}" rel="home">@svg('logo', ['class' => 'logo', 'aria-hidden' => 'true'])<span class="screen-reader-text">{{ get_bloginfo('name', 'display') }}</span></a>
    <nav id="site-navigation">
      <button class="menu-toggle" aria-expanded="false">@svg('open', ['class' => 'open', 'aria-hidden' => 'true'])@svg('close', ['class' => 'close', 'aria-hidden' => 'true'])<span class="label">{{ __('Menu', 'pcc') }}</span></button>
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container' => false]) !!}
      @endif
    </nav>
  </div>
</header>
