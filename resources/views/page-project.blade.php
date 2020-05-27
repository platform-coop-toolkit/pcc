{{--
  Template Name: Project Page
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div>
    @include('partials.page-header')
    <section class="about-project section">
      <h2 class="section-heading">About</h2>
      <p>@php the_content() @endphp</p>
    </section>
    <section class="featured-briefs section">
      <h2 class="section-heading">Featured Briefs</h2>
    </section>
    <section class="people section">
      <h2 class="section-heading">People</h2>
    </section>
  @endwhile
@endsection
