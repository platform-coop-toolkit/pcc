{{--
  Template Name: Project Home
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="pcc-project">
      @include('partials.project-header')
      <div class="project-content">
        @include('partials.project-menu')
        @include('partials.project-breadcrumbs')
        <section class="about-project section">
          <div class="heading-with-line">
            <h2 class="section-heading">{{ __('About', 'pcc') }}</h2>
            <hr>
          </div>
          <p>@php the_content() @endphp</p>
        </section>
        <section class="featured-briefs section">
          <h2 class="section-heading">{{ __('Featured Briefs', 'pcc') }}</h2>
        </section>
        <section class="section">
          <h2 class="section-heading">{{ __('Researchers', 'pcc') }}</h2>
          <div class="researchers">
            <div class="col">
              <p>Our team consists of researchers around the world investigating the state of platform cooperatives.</p>
            </div>
            <div class="col">
              <ul class="section-ul researcher-list">
                @foreach(SinglePccProject::researchers() as $researcher)
                  <li><a href="/people/{{ $researcher['slug'] }}/">{!! $researcher['name'] !!}</a></li>
                @endforeach
              <ul>
            </div>
            <div class="col">
            </div>
          </div>
        </section>
      </div>
    </div>
  @endwhile
@endsection
