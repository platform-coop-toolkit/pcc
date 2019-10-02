<div class="meta">
  <p class="datetime">@svg('calendar', ['aria-hidden' => 'true']) <time>{{ $event_date }}</time></p>
  @if($event_venue)
    @if($post->post_parent)
    <p class="address">@svg('location', ['aria-hidden' => 'true']) {!! SinglePccEvent::sessionVenue($post->ID) !!}</p>
    @else
    <p class="address" translate="no">@svg('location', ['aria-hidden' => 'true']) {!! str_replace('<p translate="no" class="address">', '', $event_venue) !!}
    @endif
  @endif
</div>
