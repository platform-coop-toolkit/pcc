<div class="pcc-stories-taxonomy-menu menu-wrapper">
    {{ __('Filter stories by:', 'pcc') }}
    <span class="stories-filter sectors menu-button">
        <h3 class="menu-button__label">{{ __('Sectors', 'pcc') }}<span class="icon"></span></h3>
        {!! Page::taxonomyMenuList('pcc-sector') !!}
    </span>

    <span class="stories-filter regions menu-button">
        <h3 class="menu-button__label">{{ __('Region', 'pcc') }}<span class="icon"></span></h3>
        {!! Page::taxonomyMenuList('pcc-region') !!}
    </span>
</div>
