<div class="entry-content" id="content">
  <div class="wp-block-group">
    <p><em>{{ sprintf(__('Participants are shown in %s order.', 'pcc'), $participant_order) }}</em></p>
    <p class="wp-block-button is-style-secondary">
      <a class="wp-block-button__link" href="{{ $reorder_participants['link'] }}">{{ $reorder_participants['label'] }}</a>
    </p>
  </div>
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
