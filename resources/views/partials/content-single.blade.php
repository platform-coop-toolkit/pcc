<article @php post_class('container') @endphp>
  <header>
    <h1 class="entry-title">{!! App::title() !!}</h1>
  </header>
  @include('partials/entry-meta')
  <div class="content" id="content">
    @if(has_post_thumbnail())
      <figure>{!! get_the_post_thumbnail($post, 'original') !!}</figure>
    @endif
    @content
  </div>
  <footer>
    @if(get_the_tags())
    <div class="tags">
      <p class="tags__label">{{ __('Tags', 'pcc') }}</p>
      {!! Single::tags() !!}
    </div>
    @endif
  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>
