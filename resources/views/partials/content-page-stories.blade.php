<article class="card pcc-story-card">
    <figure>
      @if(has_post_thumbnail())
        {!! get_the_post_thumbnail(get_the_ID(), 'small') !!}
      @else
      <div class="placeholder-wrap">
        @svg('mark', ['class' => 'placeholder'])
      </div>
      @endif
    </figure>
    <div class="pcc-story__details">
      <header class="text">
        <h2 class="title">
          <a href="{{ get_permalink() }}">{{get_post_meta (get_the_id(), 'pcc_story_organization', true)}} - {{ get_the_title() }}</a>
        </h2>
      </header>
        <div class="pcc-story__meta">
            <div class="card__region">
                <span class="screen-reader-text">{{ __('Region:','pcc') }} </span>
                <svg class="icon icon--location" aria-hidden="true" viewBox="0 0 20 20" focusable="false">
                    <use href="{{ App\asset_path('images/location.svg#location') }}" />
                </svg>
                @foreach (Page::storyRegions(get_the_ID()) as $region)
                <span>{{ $region }}</span>
                @endforeach
            </div>
        </div>
    </div>
</article>
