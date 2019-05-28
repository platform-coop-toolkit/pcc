<li class="participant">
  <figure class="participant__image">
    {!! $participant['headshot'] !!}
  </figure>
  <div class="participant__details">
    <p class="participant__name"><a href="{{ get_permalink() }}participants/{{ $participant['slug'] }}/">{{ $participant['name'] }}</a></p>
    <p class="participant__title">{{ $participant['title'] }}</p>
  </div>
</li>
