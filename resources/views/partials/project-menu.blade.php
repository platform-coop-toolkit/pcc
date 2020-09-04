<div class="pcc-ribbon ribbon">
  <nav data-overflowing="right">
    <button id="scroll-previous" class="scroll-left">
        @svg('chevron-left', ['aria-hidden' => 'true', 'height' => '12', 'width' => '7.21'])
      <span class="screen-reader-text">{{ __('Scroll to the left', 'pcc') }}</span>
    </button>
    {!! wp_nav_menu(['menu' => SinglePccProject::menuName(), 'menu_class' => 'nav', 'container' => false]) !!}
    <button id="scroll-next" class="scroll-right">
        @svg('chevron-right', ['aria-hidden' => 'true', 'height' => '12', 'width' => '7.21'])
      <span class="screen-reader-text">{{ __('Scroll to the right', 'pcc') }}</span>
    </button>
  </nav>
</div>
