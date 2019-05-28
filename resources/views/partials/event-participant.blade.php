<li class="participant">
  @if(!empty($participant['headshot']))
  <figure class="participant__image">
    {!! wp_get_attachment_image($participant['headshot'], 'person-desktop') !!}
  </figure>
  @endif
  <div class="participant__details">
    <p class="participant__name"><a href="{{ get_permalink() }}participants/{{ $participant['slug'] }}/">{{ $participant['name'] }}</a></p>
    <p class="participant__title">{{ $participant['title'] }}</p>
  </div>
</li>
