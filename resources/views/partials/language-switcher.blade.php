@if(function_exists('pll_the_languages') && !empty(get_option('platformcoop_localization')['enabled_languages']))
<li class="menu-item menu-item--languages menu-item-has-children">
  <a class="menu__item" href="#">
    <span class="menu__label">{{ __('Language', 'pcc') }}</span>
    @svg('language', 'icon--language icon--lg', ['focusable' => 'false', 'aria-hidden' => 'true'])
  </a>
  <ul class="menu__submenu">
    @if(function_exists('pll_the_languages'))
      @foreach(pll_the_languages(['raw' => 1]) as $translation)
      @if($translation['slug'] === 'en' || in_array($translation['slug'], get_option('platformcoop_localization')['enabled_languages']))
      <li class="menu-item"><a {!! $translation['current_lang'] ? 'aria-current="true"' : '' !!}href="{{ $translation['url'] }}" class="menu__item">{{ $translation['name'] }}</a></li>
      @endif
      @endforeach
    @endif
  </ul>
</li>
@endif
