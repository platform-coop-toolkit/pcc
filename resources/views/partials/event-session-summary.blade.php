<li class="session">
    <time class="session__time" datetime="{{ strftime('%FT%T', $session->pcc_event_start) }}">{{ strftime('%l:%M%p', $session->pcc_event_start) }}</time>
    <div class="session__info">
      <p class="session__title">
        <a href="@permalink($session->ID)">@title($session->ID)</a>
      </p>
      <div class="session__description">
      {!! apply_filters('the_content', $session->post_content) !!}
      </div>
    </div>
</li>
