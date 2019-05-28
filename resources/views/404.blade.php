@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <div id="content" class="content">
    <p>
      {{ __('Sorry, we couldn’t find this page.', 'pcc') }}
    </p>
    <div class="wp-block-button is-style-secondary">
      <a class="wp-block-button__link" href="{{ home_url() }}">{{ __('Back to home', 'pcc') }}</a>
    </div>
  </div>
@endsection
