<div class="ribbon">
  <nav>
    <ul>
      <li><a href="@permalink($post->post_parent)">{{ __('Conference', 'platformcoop') }}</a></li>
      <li><a rel="current" href="{{ get_permalink($post->post_parent) }}program/">{{ __('Program', 'platformcoop') }}</a></li>
      <li><a href="{{ get_permalink($post->post_parent) }}participants/">{{ __('Participants', 'platformcoop') }}</a></li>
    </ul>
  </nav>
</div>
