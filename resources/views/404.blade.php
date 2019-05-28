@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <div id="content">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, but the page you were trying to view does not exist.', 'platformcoop') }}
      </div>
      {!! get_search_form(false) !!}
    @endif
  </div>
@endsection
