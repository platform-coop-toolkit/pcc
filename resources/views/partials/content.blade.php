<article @php post_class('blog card') @endphp>
  <figure class="blog__image">
    @if(has_post_thumbnail())
      {!! get_the_post_thumbnail(get_the_ID(), 'post-thumbnail') !!}
    @else
      <div class="placeholder-wrap">
        @svg('mark', ['class' => 'placeholder'])
      </div>
    @endif
  </figure>
  <div class="blog__details">
    <header class="text">
      <h2 class="title"><a href="@permalink">{!! get_the_title() !!}</a></h2>
    </header>
    @include('partials/entry-card-meta')
  </div>
</article>
