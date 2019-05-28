<div class="ribbon">
  <nav>
    <ul>
      <li class="menu-item"><a href="@permalink($post->post_parent)">{{ __('Conference', 'platformcoop') }}</a></li>
      <li class="menu-item"><a class="parent" href="{{ get_permalink($post->post_parent) }}program/">{{ __('Program', 'platformcoop') }}</a></li>
      <li class="menu-item"><a href="{{ get_permalink($post->post_parent) }}participants/">{{ __('Participants', 'platformcoop') }}</a></li>
      @if(SinglePccEvent::registrationLink($post->post_parent))
      <li class="wp-block-button is-style-primary"><a class="wp-block-button__link" href="{{ SinglePccEvent::registrationLink($post->post_parent) }}">{{ __('Register Now', 'platformcoop') }}</a></li>
      @endif
    </ul>
  </nav>
</div>
