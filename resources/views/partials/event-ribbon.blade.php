<div class="ribbon">
  <nav>
    <ul>
      <li>
        <a @if(!$event_view) rel="current" @endif href="@permalink">
        @if($event_type === 'conference')
          {{ __('Conference', 'platformcoop') }}
        @else
          {{ __('Event', 'platformcoop') }}
        @endif
        </a>
      </li>
      <li><a @if($event_view === 'program')
          rel="current"
          @endif href="{{ get_permalink() }}program/">{{ __('Program', 'platformcoop') }}</a></li>
      <li><a @if($event_view === 'participants')
          rel="current"
          @endif href="{{ get_permalink() }}participants/">{{ __('Participants', 'platformcoop') }}</a></li>
    </ul>
  </nav>
</div>
