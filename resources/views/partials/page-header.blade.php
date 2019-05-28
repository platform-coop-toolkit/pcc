<div class="page-header @if(has_post_thumbnail()) page-header--media @endif">
  <div class="page-header__inside">
    @if(has_post_thumbnail())
    <figure class="page-header__media">
        @thumbnail('banner')
    </figure>
    @endif
    <div class="page-header__content">
      @include('partials/breadcrumb')
      <h1>{!! App::title() !!}</h1>
      @if(has_excerpt())
        <p class="subhead">{{ get_the_excerpt() }}</p>
      @endif
    </div>
    @if(has_post_thumbnail())
      <div class="fold">
        @svg('fold', ['aria-hidden' => 'true'])
      </div>
    @endif
  </div>
</div>
