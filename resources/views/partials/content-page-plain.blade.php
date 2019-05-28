<div class="content">
  <div class="wp-block-columns has-2-columns">
    <div class="wp-block-column meta">
      <p>
        <strong>{{ __('Last updated', 'platformcoop') }}</strong><br />
        <span class="datetime">@modified('M j, Y')</span>
      </p>
    </div>
    <div class="wp-block-column">
      @content
    </div>
  </div>
</div>
