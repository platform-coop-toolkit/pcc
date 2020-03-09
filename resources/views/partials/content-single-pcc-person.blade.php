<div class="entry-content">
    <div class="wp-block-columns has-2-columns">
      <div class="wp-block-column">
      <h2>{{ __('Bio', 'pcc') }}</h2>
      </div>
      <div class="wp-block-column">
        @content
        @if($person_data['links'])
    </div>
  </div>
  <div class="wp-block-columns has-2-columns">
    <div class="wp-block-column">
    <h2>{{ __('Connect', 'pcc') }}</h2>
    </div>
    <div class="wp-block-column">
      <ul class="links">
        @foreach($person_data['links'] as $link)
        <li><a href="{{ $link['link'] }}">{!! $link['label'] !!}</a></li>
        @endforeach
      </ul>
@endif
        <p class="wp-block-button is-style-secondary">
        <a class="wp-block-button__link" href="{{ get_the_permalink(get_page_by_title('People')) }}">{{ __('Back to people', 'pcc') }}</a>
        </p>
      </div>
  </div>
