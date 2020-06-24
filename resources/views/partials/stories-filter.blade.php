<div class="stories-filters">
  {{ __('View all stories by:', 'pcc') }}
  <span class="stories-filter sectors menu-button">
    <h3 class="menu-button__label">{{ __('Sectors', 'pcc') }}<span class="icon"></span></h3>
    {{ $current_url }}
    {!! App::tagList('pcc-sector', array('ul_classname' => 'link-list', 'li_classname' => 'link-list__item' )) !!}
  </span>

  <span class="stories-filter regions menu-button">
    <h3 class="menu-button__label">{{ __('Region', 'pcc') }}<span class="icon"></span></h3>
    {!! App::tagList('pcc-region', array('ul_classname' => 'link-list', 'li_classname' => 'link-list__item')) !!}
  </span>
</div>
