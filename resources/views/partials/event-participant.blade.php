<li class="participant card">
  <figure class="participant__image">
    @if(!empty($participant['headshot']))
      {!! wp_get_attachment_image($participant['headshot'], 'person-desktop') !!}
    @else
      <div class="placeholder-wrap">
        @svg('mark', ['class' => 'placeholder'])
      </div>
    @endif
  </figure>
  <div class="participant__details text">
    <p class="participant__name title">
      <a href="{{ ($post->post_parent) ? get_permalink($post->post_parent) : get_permalink() }}participants/{{ $participant['slug'] }}/">{!! $participant['name'] !!} @svg('chevron-right', ['aria-hidden' => 'true', 'viewbox' => '0 0 5.93335 9.85001'])</a>
      @if($participant['short_title'])
      <span class="participant__title">
        {{ $participant['short_title'] }}
      </span>
      @endif
    </p>
  </div>
</li>
