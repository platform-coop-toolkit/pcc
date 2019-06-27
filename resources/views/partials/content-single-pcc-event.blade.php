<div class="content" id="content">
  @content
  @if(!empty(SinglePccEvent::eventParticipants(6)))
  <div class="wp-block-columns has-2-columns">
    <div class="wp-block-column">
      <h2>{{ __('Participants', 'pcc')}}</h2>
    </div>
    <div class="wp-block-column">
      <ul class="participants cards cards--two-columns">
      @foreach(SinglePccEvent::eventParticipants(6) as $participant)
        @include('partials/event-participant')
      @endforeach
      </ul>
      <p class="wp-block-button is-style-secondary">
        <a class="wp-block-button__link" href="@permalink()participants/">{{ __('See all participants', 'pcc') }}</a>
      </p>
    </div>
  </div>
  @endif
  @if(!empty($event_sponsors))
  <div class="wp-block-columns has-2-columns">
    <div class="wp-block-column">
      <h2>{{ __('Sponsors', 'pcc')}}</h2>
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
