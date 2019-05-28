<div class="ribbon">
  <nav>
    <ul>
      <li><a href="@permalink($post->post_parent)">{{ __('Conference', 'pcc') }}</a></li>
      <li><a rel="current" href="{{ get_permalink($post->post_parent) }}program/">{{ __('Program', 'pcc') }}</a></li>
      <li><a href="{{ get_permalink($post->post_parent) }}participants/">{{ __('Participants', 'pcc') }}</a></li>
    </ul>
  </nav>
</div>
