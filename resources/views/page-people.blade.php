{{--
  Template Name: People Page
--}}

@extends('layouts.app')

@section('content')
  @include('partials.page-header')
    <div id="content">
      <div class="wp-block-group">
        <div class="cards cards--three-columns">
        @if (!$people_query->have_posts())
          <div class="alert alert-warning">
            {{ __('Sorry, no results were found.', 'pcc') }}
          </div>
          {!! get_search_form(false) !!}
        @endif

        @while ($people_query->have_posts()) @php $people_query->the_post() @endphp
          @include('partials.content-pcc-person')
        @endwhile
        @php(wp_reset_postdata())
      </div>
      {!! get_the_posts_pagination(['prev_text' => '&lsaquo; <span class="screen-reader-text">%s</span>', 'next_text' => ' <span class="screen-reader-text">%s</span> &rsaquo;']) !!}
    </div>
  </div>
@endsection
