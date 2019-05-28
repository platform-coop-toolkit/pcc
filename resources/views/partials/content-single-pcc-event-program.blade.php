<div class="entry-content" id="content">
  @foreach($event_program as $date => $day)
    <div class="program wp-block-columns has-2-columns">
      <div class="wp-block-column">
        <h2>{{ sprintf(__('Day %d', 'pcc'), $loop->iteration) }}<br />{{ $date }}</h2>
      </div>
      <div class="wp-block-column">
          <ul class="program__day">
            @foreach($day as $session)
            @include('partials/event-session-summary')
            @endforeach
          </ul>
      </div>
    </div>
  @endforeach
</div>

