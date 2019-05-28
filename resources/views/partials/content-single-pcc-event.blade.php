<div class="entry-content" id="content">
  @content
  <div class="participants wp-block-columns has-2-columns">
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
  <div class="sponsors wp-block-columns has-2-columns">
    <div class="wp-block-column">
      <h2>{{ __('Sponsors', 'platformcoop')}}</h2>
    </div>
    <div class="wp-block-column">
      <ul class="sponsors">
        @foreach($event_sponsors as $sponsor)
          <li class="sponsor">
            {{-- TODO: Logos --}}
            <a href="{{ $sponsor['link'] }}">{{ $sponsor['name'] }}</a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
