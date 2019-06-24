<div class="ribbon">
  <nav>
    <button id="scroll-previous" class="scroll-left">
        @svg('chevron-left', ['aria-hidden' => 'true', 'height' => '12', 'width' => '7.21'])
      <span class="screen-reader-text">{{ __('Scroll to the left', 'pcc') }}</span>
    </button>
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
    </ul>
    <button id="scroll-next" class="scroll-right">
        @svg('chevron-right', ['aria-hidden' => 'true', 'height' => '12', 'width' => '7.21'])
      <span class="screen-reader-text">{{ __('Scroll to the right', 'pcc') }}</span>
    </button>
    @if(SinglePccEvent::registrationLink())
    <p class="wp-block-button is-style-primary"><a class="wp-block-button__link" href="{{ SinglePccEvent::registrationLink() }}">{{ __('Register Now', 'pcc') }}</a></p>
    @endif
  </nav>
</div>
