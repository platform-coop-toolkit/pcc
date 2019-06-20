<li class="participant">
  <figure class="participant__image">
    @if(!empty($participant['headshot']))
      {!! wp_get_attachment_image($participant['headshot'], 'person-desktop') !!}
    @else
      <div role="img" style="background-color: #30cfc9; height: 100%;"></div>
    @endif
  </figure>
  <div class="participant__details">
    <p class="participant__name"><a href="{{ get_permalink() }}participants/{{ $participant['slug'] }}/">{{ $participant['name'] }}</a></p>
    <p class="participant__title">{{ $participant['title'] }}</p>
  </div>
</li>
