<div class="entry-content" id="content">
    @if(!empty($event_program))
    <p class="program-nav">Jump to: @foreach($event_program as $day) <a href="@permalink()program/#day-{{ $loop->iteration }}">{{ sprintf(__('Day %d', 'pcc'), $loop->iteration) }} @svg('down', ['aria-hidden' => 'true'])</a>@endforeach</p>
    @foreach($event_program as $date => $day)
    <div class="program wp-block-columns has-2-columns" id="day-{{ $loop->iteration }}">
      <div class="wp-block-column">
        <h2>{{ sprintf(__('Day %d', 'pcc'), $loop->iteration) }}: {{ $date }}</h2>
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
    @else
      <div class="wp-block-group">
          <p>{!! sprintf(__('The program for <em>%s</em> is not yet available. Thank you for your patience!', 'pcc'), get_the_title()) !!}</p>
      </div>
    @endif
</div>

