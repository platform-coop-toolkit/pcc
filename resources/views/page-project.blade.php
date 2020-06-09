{{--
  Template Name: Project Page
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="project">
      @include('partials.project-header')
      <div class="project-content">
        @include('partials.project-breadcrumbs')
        <section class="about-project section">
          <div class="heading-with-line">
            <h2 class="section-heading">About</h2>
            <hr>
          </div>
          <p>@php the_content() @endphp</p>
        </section>
        <section class="featured-briefs section">
          <h2 class="section-heading">Featured Briefs</h2>
        </section>
        <section class="people section">
          <h2 class="section-heading">People</h2>
        </section>
      </div>
    </div>
  @endwhile
@endsection
