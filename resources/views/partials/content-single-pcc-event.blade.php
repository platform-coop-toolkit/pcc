<div class="entry-content" id="content">
  @content
  @if(!empty(SinglePccEvent::eventParticipants(6)))
  <div class="wp-block-columns has-2-columns">
    <div class="wp-block-column">
      <h2>{{ __('Participants', 'platformcoop')}}</h2>
    </div>
    <div class="wp-block-column">
      <ul class="participants">
      @foreach(SinglePccEvent::eventParticipants(6) as $participant)
        @include('partials/event-participant')
      @endforeach
      </ul>
    </div>
  </div>
  @endif
  @if(!empty($event_sponsors))
  <div class="wp-block-columns has-2-columns">
    <div class="wp-block-column">
      <h2>{{ __('Sponsors', 'platformcoop')}}</h2>
    </div>
    <div class="wp-block-column">
      <ul class="sponsors">
        @foreach($event_sponsors as $sponsor)
          @include('partials/event-sponsor')
        @endforeach
      </ul>
    </div>
  </div>
  @endif
</div>
