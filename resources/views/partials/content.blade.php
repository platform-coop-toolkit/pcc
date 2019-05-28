<article @php post_class() @endphp>
  <header>
    <h2 class="entry-title"><a href="@permalink">{!! App::title() !!}</a></h2>
    @include('partials/entry-meta')
  </header>
  <div class="entry-summary">
    @excerpt
  </div>
</article>
