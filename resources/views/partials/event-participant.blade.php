<li class="participant">
  <figure class="participant__image">
    @if(!empty($participant['headshot']))
      {!! wp_get_attachment_image($participant['headshot'], 'person-desktop') !!}
    @else
      @svg('mark')
    @endif
  </figure>
  <div class="participant__details">
    <p class="participant__name">
      <a href="{{ get_permalink() }}participants/{{ $participant['slug'] }}/">{{ $participant['name'] }} @svg('chevron-right', ['aria-hidden' => 'true', 'viewbox' => '0 0 5.93335 9.85001'])</a>
      @if($participant['title'])
      <span class="participant__title">
        {{ $participant['title'] }}
        @if($participant['organization'])
        at {{ $participant['organization'] }}
        @endif
      </span>
      @endif
    </p>
  </div>
</li>
