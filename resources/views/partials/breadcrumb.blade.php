<p class="breadcrumb">
  <a href="{{ $breadcrumb['url'] }}">
    @if($breadcrumb['hide_back_to'])
      <span class="screen-reader-text">{{ __('Back to', 'pcc') }} </span>{!! $breadcrumb['label'] !!}
    @else
    {!! sprintf(__('Back to %s', 'pcc'), $breadcrumb['label']) !!}
    @endif</a>
</p>
