{{--
  Template Name: Project Research Page
--}}

@extends('layouts.app')


@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="pcc-project">
      @include('partials.project-header')
      <section class="project-content">
        @include('partials.project-breadcrumbs')
        <h1>{!! App::title() !!}</h1>
        <div class="map-container">
          @php get_post_custom( $map_code ) @endphp
        </div>

        <div>@php the_content() @endphp</div>
        <section class="section research-locations">
          <div class="section-info">
            <h2 class="section-heading">List of Places</h2>
            <p class="section-description">Some text about the list of places.</p>
          </div>
          <div class="section-content">
            <ul class="location-list">
              <li>Location 1</li>
              <li>Location 2</li>
              <li>Location 3</li>
              <li>Location 4</li>
            </ul>
          </div>
        </section>
      </section>
    </div>
  @endwhile
@endsection
