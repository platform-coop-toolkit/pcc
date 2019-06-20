<div class="meta">
  <p class="datetime">@svg('calendar', ['aria-hidden' => 'true']) <time>{{ $event_date }}</time></p>
  @if($event_venue)
    <p class="address" translate="no">@svg('location', ['aria-hidden' => 'true']) {!! str_replace('<p translate="no" class="address">', '', $event_venue) !!}
  @endif
</div>
