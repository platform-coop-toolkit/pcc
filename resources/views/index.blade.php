@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <div class="wp-block-group">
    {{-- <h2>{{ __('Featured', 'pcc') }}</h2>
    <hr /> --}}
    <h2>{{ __('Most recent', 'pcc') }}</h2>
    <div id="content" class="cards cards--three-columns">
      @if (!have_posts())
        <div class="alert alert-warning">
          {{ __('Sorry, no results were found.', 'pcc') }}
        </div>
        {!! get_search_form(false) !!}
      @endif

      @while (have_posts()) @php the_post() @endphp
        @include('partials.content-'.get_post_type())
      @endwhile
    </div>
    {!! get_the_posts_pagination(['mid_size' => 5, 'prev_text' => '&lsaquo; <span class="screen-reader-text">%s</span>', 'next_text' => ' <span class="screen-reader-text">%s</span> &rsaquo;']) !!}
  </div>
@endsection
