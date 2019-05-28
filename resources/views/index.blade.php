@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <div id="content">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'platformcoop') }}
      </div>
      {!! get_search_form(false) !!}
    @endif

    @while (have_posts()) @php the_post() @endphp
      @include('partials.content-'.get_post_type())
    @endwhile

    {!! get_the_posts_navigation() !!}
  </div>
@endsection
