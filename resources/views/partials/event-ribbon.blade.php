<div class="ribbon">
  <nav>
    <ul>
      <li>
        <a @if(!$event_view) rel="current" @endif href="@permalink">
        @if($event_type === 'conference')
          {{ __('Conference', 'pcc') }}
        @else
          {{ __('Event', 'pcc') }}
        @endif
        </a>
      </li>
      <li><a @if($event_view === 'program')
          rel="current"
          @endif href="{{ get_permalink() }}program/">{{ __('Program', 'pcc') }}</a></li>
      <li><a @if($event_view === 'participants')
          rel="current"
          @endif href="{{ get_permalink() }}participants/">{{ __('Participants', 'pcc') }}</a></li>
    </ul>
  </nav>
</div>
