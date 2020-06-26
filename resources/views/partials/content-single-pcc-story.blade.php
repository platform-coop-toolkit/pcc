@php $org = get_post_meta (get_the_ID(), 'pcc_story_organization', true) @endphp
<article @php post_class('container') @endphp>
  <header>
    @include('partials/breadcrumb')
    <h1 class="entry-title">{{ $org }} - "{!! App::title() !!}"</h1>
  </header>
  @include('partials/entry-meta')

  <div class="content" id="content">
    <div class="pcc-story-video-container">
        {!! SinglePccStory::getVideoEmbed () !!}
    </div>
    @content
  </div>
  <footer>
    <div class="tags-container">

      @if ($sectorList = SinglePccStory::tagList('pcc-sector'))
      <h2>{{ __('Sectors', 'pcc') }}</h2>
      {!! $sectorList !!}
      @endif

      @if ($regionList = SinglePccStory::tagList('pcc-region'))
      <h2>{{ __('Regions', 'pcc') }}</h2>
      {!! $regionList !!}
      @endif

      @if(get_the_tags())
      <h2>{{ __('Tags', 'pcc') }}</h2>
      {!! Single::tags() !!}
      @endif
    </div>
  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>
