<article @php post_class() @endphp>
  <header>
    <h2 class="entry-title"><a href="@permalink">{!! App::title() !!}</a></h2>
    @if (get_post_type() === 'post')
      @include('partials/entry-meta')
    @endif
  </header>
  <div class="entry-summary">
    @excerpt
  </div>
</article>
