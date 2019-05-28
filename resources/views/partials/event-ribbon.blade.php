<div class="ribbon">
  <button class="scroll-left"><span class="screen-reader-text">{{ __('Scroll to the left', 'pcc') }}</span></button>
  <button class="scroll-right"><span class="screen-reader-text">{{ __('Scroll to the left', 'pcc') }}</span></button>
  <nav>
    <ul>
      @foreach($event_ribbon as $item)
      <li class="menu-item
      @if ($loop->last)
        menu-item--last
      @endif">
        <a
          @if($item['class'])class="{{ $item['class'] }}"@endif
          @if($item['rel'])rel="{{ $item['rel'] }}"@endif
          href="{{ $item['link'] }}">
          {{ $item['label'] }}
        </a>
      </li>
      @endforeach
      @if(SinglePccEvent::registrationLink())
      <li class="wp-block-button is-style-primary"><a class="wp-block-button__link" href="{{ SinglePccEvent::registrationLink() }}">{{ __('Register Now', 'pcc') }}</a></li>
      @endif
    </ul>
  </nav>
</div>
