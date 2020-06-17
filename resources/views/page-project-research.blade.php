{{--
  Template Name: Project Research Page
--}}

@extends('layouts.app')


@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="pcc-project">
      @include('partials.project-header')
      <div class="side-margins">
        @include('partials.project-breadcrumbs')
        <h1>{!! App::title() !!}</h1>
      </div>
      <!-- <div class="map-container no-margins">
        @php get_post_custom( $map_code ) @endphp
        @php the_content() @endphp
      </div> -->
      <section class="no-margins">
        <div>@php the_content() @endphp</div>
      </section>
      <section class="section research-locations section-a side-margins">
        <div class="section-info">
          <h2 class="section-heading">List of Places</h2>
          <p class="section-description">Some text about the list of places.</p>
        </div>
        <div class="section-content">
          <ul class="location-list section-ul">
            <li>Location 1</li>
            <li>Location 2</li>
            <li>Location 3</li>
            <li>Location 4</li>
            <li>Location 1</li>
            <li>Location 2</li>
            <li>Location 3</li>
            <li>Location 4</li>
          </ul>
        </div>
      </section>
    </div>
  @endwhile
@endsection
