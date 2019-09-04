<article @php post_class('blog card') @endphp>
  <figure class="blog__image">
    @if(!empty($participant['headshot']))
      {!! wp_get_attachment_image($participant['headshot'], 'person-desktop') !!}
    @else
      <div class="placeholder-wrap">
        @svg('mark', ['class' => 'placeholder'])
      </div>
    @endif
  </figure>
  <div class="blog__details">
    <header>
      <h2 class="entry-title"><a href="@permalink">{!! App::title() !!}</a></h2>
      @include('partials/entry-card-meta')
    </header>
    <div class="entry-summary">
      @excerpt
    </div>
  </div>
</article>
