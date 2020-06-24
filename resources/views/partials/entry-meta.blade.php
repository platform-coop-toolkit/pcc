<div class="entry-meta">
  <time class="published" datetime="@published('c')">@published('M j, Y')</time>
  <div class="byline author vcard">
    {{ __('By', 'pcc') }} <span class="fn">
      @if( get_post_type() === 'pcc-story' )
        {{ $storyteller }}
        @if ($storyteller && $story_org)
        ,
        @endif
        <em>{{ $story_org }}</em>
      @elseif ($author)
        {{ $author }}
      @else
        {{ get_the_author() }}
      @endif
    </span>
  </div>
</div>
