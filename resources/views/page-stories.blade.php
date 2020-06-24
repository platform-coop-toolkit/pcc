@extends('layouts.app')
@section('content')
@include('partials.page-header-stories')
  <div id="content" class="pcc-story">
    @php $query = $recent_stories_by_org_query @endphp
    @if ($query->have_posts())
        <div class="wp-block-group">
            <h2>{{ __('Most recent stories by cooperatives', 'pcc') }}</h2>

            <div class="cards cards--three-columns">
                @while ($query->have_posts())
                    @php $query->the_post() @endphp
                    @include('partials.content-page-stories')
                @endWhile
              </div>
        </div>
    @else
        No Stories.
    @endif

    @php(wp_reset_postdata())

  </div>
@endsection
