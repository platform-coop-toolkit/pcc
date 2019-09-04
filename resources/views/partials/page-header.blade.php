<div class="page-header @if(!is_home() && has_post_thumbnail()) page-header--media @endif">
  <div class="page-header__inside">
    @if(!is_home() && has_post_thumbnail())
    <figure class="page-header__media">
        @thumbnail('banner')
    </figure>
    @endif
    <div class="page-header__content">
      @if(!is_404() && !is_front_page())
        @include('partials/breadcrumb')
      @endif
      @if(is_front_page())
      <h1 class="screen-reader-text">{{ __('Platform Cooperativism Consortium', 'pcc') }}</h1>
      @else
      <h1>{!! App::title() !!}</h1>
      @endif
      @if(is_home() && has_excerpt($blog_page->ID))
        <p class="subhead">{!! get_the_excerpt($blog_page) !!}</p>
      @elseif(has_excerpt())
        <p class="subhead">{!! str_replace('_', '<mark>', get_the_excerpt()) !!}</p>
      @endif
    </div>
    @if(!is_home() && has_post_thumbnail())
      <div class="fold">
        @svg('fold', ['aria-hidden' => 'true'])
      </div>
    @endif
  </div>
</div>
