<div class="entry-content">
  <div class="wp-block-columns has-2-columns">
    <div class="wp-block-column">
    <h2>{{ __('Bio', 'pcc') }}</h2>
    </div>
    <div class="wp-block-column">
      @content
      <p class="wp-block-button is-style-secondary">
        <a class="wp-block-button__link" href="@permalink($event)participants/">{{ __('Back to participants', 'pcc') }}</a>
      </p>
    </div>
</div>
