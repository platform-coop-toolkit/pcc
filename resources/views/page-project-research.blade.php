{{--
  Template Name: Project Research Page
--}}

@extends('layouts.app')

<div class="project">
  @section('content')
    @while(have_posts()) @php the_post() @endphp
      @include('partials.project-header')
      <div class="project-content">
        @include('partials.project-breadcrumbs')
      </div>
    @endwhile
  @endsection
</div>
