<div class="ribbon">
  <nav>
    <ul>
      <li class="menu-item">
        <a @if(!$event_view) rel="current" @endif href="@permalink">
        @if($event_type === 'conference')
          {{ __('Conference', 'platformcoop') }}
        @else
          {{ __('Event', 'platformcoop') }}
        @endif
        </a>
      </li>
      <li class="menu-item"><a @if($event_view === 'program')
          rel="current"
          @endif href="{{ get_permalink() }}program/">{{ __('Program', 'platformcoop') }}</a></li>
      <li class="menu-item"><a @if($event_view === 'participants')
          rel="current"
          @endif @if($event_view === 'participant')
          class="parent"
          @endif href="{{ get_permalink() }}participants/">{{ __('Participants', 'platformcoop') }}</a></li>
      @if(SinglePccEvent::registrationLink())
      <li class="wp-block-button is-style-primary"><a class="wp-block-button__link" href="{{ SinglePccEvent::registrationLink() }}">{{ __('Register Now', 'platformcoop') }}</a></li>
      @endif
    </ul>
  </nav>
</div>
