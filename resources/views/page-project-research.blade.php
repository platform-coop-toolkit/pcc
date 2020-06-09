{{--
  Template Name: Project Research Page
--}}

@extends('layouts.app')


@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="project">
      @include('partials.project-header')
      <div class="project-content">
        @include('partials.project-breadcrumbs')
      </div>
    </div>
  @endwhile
@endsection
