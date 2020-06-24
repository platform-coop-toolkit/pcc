<article @php post_class('container') @endphp>
    <header>
        @include('partials/breadcrumb')
        <h1 class="entry-title">{!! App::title() !!}</h1>
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
            @if ($sectors)
            <h2>{{ __('Sectors', 'pcc') }}</h2>
            {!! $sectors !!}
            @endif

            @if ($regions)
            <h2>{{ __('Regions', 'pcc') }}</h2>
            {!! $regions !!}
            @endif

            @if(get_the_tags())
            <h2>{{ __('Tags', 'pcc') }}</h2>
            {!! Single::tags() !!}
            @endif
        </div>
    </footer>
    @php comments_template('/partials/comments.blade.php') @endphp
</article>
