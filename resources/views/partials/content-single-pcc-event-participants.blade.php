<div class="entry-content" id="content">
  @if(!empty(SinglePccEvent::eventParticipants()))
  <div class="wp-block-group">
    <ul class="participants cards cards--three-columns">
    @foreach(SinglePccEvent::eventParticipants() as $participant)
      @include('partials/event-participant')
    @endforeach
    </ul>
  </div>
  @else
    <div class="wp-block-group">
      <p>{{ __('No participants were found.', 'pcc') }}</p>
    </div>
  @endif
</div>
