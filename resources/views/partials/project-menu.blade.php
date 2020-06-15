<!-- <div class="pcc-ribbon ribbon project-menu">
  <nav>
    <ul>
      <li class="active">About - Main Project Link</li>
      <li>Research</li>
      <li>Test</li>
      <li>Test</li>
      <li>Test</li>
      <li>Test</li>
    </ul>
  </nav>
</div> -->


<div class="pcc-ribbon ribbon project-menu">
  <nav>
    <button id="scroll-previous" class="scroll-left">
        @svg('chevron-left', ['aria-hidden' => 'true', 'height' => '12', 'width' => '7.21'])
      <span class="screen-reader-text">{{ __('Scroll to the left', 'pcc') }}</span>
    </button>
    <ul>
      <li class="menu-item active"><a>About - Main Project Link</a></li>
      <li class="menu-item"><a>Research</a></li>
      <li class="menu-item menu-item--last"><a>Test</a></li>
    </ul>
    <button id="scroll-next" class="scroll-right">
        @svg('chevron-right', ['aria-hidden' => 'true', 'height' => '12', 'width' => '7.21'])
      <span class="screen-reader-text">{{ __('Scroll to the right', 'pcc') }}</span>
    </button>
  </nav>
</div>
