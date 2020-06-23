{{--
  Template Name: Project Research Page
--}}

@extends('layouts.app')


@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="pcc-project">
      @include('partials.project-header')
      <div class="project-content">
        @include('partials.project-menu')
        @include('partials.project-breadcrumbs')
        <h1 class="research">{!! $post->post_title !!}</h1>
      </div>
      <div class="map-container no-margins">
        @php get_post_custom( $map_code ) @endphp
        @php the_content() @endphp
      </div>
      <section class="section places">
        <div class="col">
          <h2>{{ __("List of Places", "pcc") }}</h2>
          <p class="section-description">{{ __("The following locations are research areas. Click to learn more.", "pcc") }}</p>
        </div>
        <div class="col">
          <ul class="location-list section-ul">
            <li><a href="#">Gujarat</a></li>
            <li>Location 2</li>
            <li>Location 3</li>
            <li>Location 4</li>
          </ul>
        </div>
      </section>
    </div>
  @endwhile
@endsection
