{{--
  Template Name: Community Stories
--}}

@extends('layouts.app')
@section('content')
@include('partials.page-header-stories')
<div id="content" class="pcc-story">

    <div class="wp-block-group">
        @include('partials.stories-organization-filter')

        @if ($stories_query->have_posts())
        <div class="cards cards--two-columns">
            @while ($stories_query->have_posts())
            @php $stories_query->the_post() @endphp
            @include('partials.content-page-stories')
            @endWhile
        </div>
        @else
        <div class="cards">
            <h2>{{ __( 'No stories found', 'pcc' ) }}</h2>
            <p>{{ __( 'No stories matched the chosen criteria.', 'pcc' ) }}
        </div>
        @endif
    </div>

    @php(wp_reset_postdata())
</div>
@endsection
