<div class="page-header">
  <div class="page-header__inside">
    <div class="page-header__content">
      @if(!is_404() && !is_front_page())
        @include('partials/breadcrumb')
      @endif

      <h1>{!! App::title() !!}</h1>
      @if(has_excerpt())
        <p class="subhead">{!! str_replace('_', '<mark>', get_the_excerpt()) !!}</p>
      @endif

      @include('partials.stories-filter')
    </div>

    @if(!is_home() && !is_archive() && !is_404() && has_post_thumbnail())
      <div class="fold">
        @svg('fold', ['aria-hidden' => 'true'])
      </div>
    @endif
  </div>
</div>
