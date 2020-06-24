@php $org = get_post_meta (get_the_ID(), 'pcc_story_organization', true) @endphp
<article @php post_class('container') @endphp>
  <header>
    @include('partials/breadcrumb')
    <h1 class="entry-title">{{ $org }} - "{!! App::title() !!}"</h1>
  </header>
  @include('partials/entry-meta')

  <div class="content" id="content">
    <div class="pcc-story-video-container">
    @php echo wp_oembed_get(get_post_meta (get_the_ID(), 'pcc_story_video_link', true)) @endphp
    </div>
    @content
  </div>
  <footer>
    <div class="tags-container">
      @php
          $sectorList = SinglePccStory::sectors();
          $regionList = SinglePccStory::regions();
      @endphp

      @if ($sectorList)
      <p>{{ __('Sectors', 'pcc') }}</p>
      {!! $sectorList !!}
      @endif

      @if ($regionList)
      <p>{{ __('Regions', 'pcc') }}</p>
      {!! $regionList !!}
      @endif

      @if(get_the_tags())
      <p>{{ __('Tags', 'pcc') }}</p>
      {!! Single::tags() !!}
      @endif
    </div>
  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>
