{{--
  Template Name: ICDE Page
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
  @if(!empty(Projects::projects()))
    <div class="projects-container">
      <div class="wp-block-columns has-2-columns">
        <div class="wp-block-column">
          <h2>Projects</h2>
          <p>The institute orchestrates various research projects around the world.</p>
        </div>
        <div class="wp-block-column">
          <ul class="cards projects cards--two-columns">
            @foreach(Projects::projects() as $project)
                <article class="card post format-standard status-publish has-post-thumbnail">
                  <div class="project__details">
                    <header class="text">
                      <h2 class="title">
                        <a href="{!! $project['page_link_id'] !!}">{!! $project['title'] !!}</a>
                      </h2>
                      <p class="desc">{!! $project['content'] !!}</p>
                    </header>
                  </div>
                  <figure>{!! wp_get_attachment_image($project['image'], 'medium') !!}</figure>
                </article>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  @endif
@endsection
