<article @php post_class('container') @endphp>
  <header>
    <h1 class="entry-title">{!! App::title() !!}</h1>
    @include('partials/entry-meta')
    @if(has_post_thumbnail())
      <figure>{!! get_the_post_thumbnail($post, 'original') !!}</figure>
    @endif
  </header>
  <div class="content" id="content">
    @content
  </div>
  <footer>
    <div class="tags">
      <p class="tags__label">{{ __('Tags', 'pcc') }}</p>
      {!! Single::tags() !!}
    </div>
  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>
