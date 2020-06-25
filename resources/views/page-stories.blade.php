@extends('layouts.app')
@section('content')
@include('partials.page-header-stories')
  <div id="content" class="pcc-story">

    <form action="">

      <input type="hidden" name="post_type" value="pcc-story" />

      <select name="org"><option>Filter by Organization:</option>
        @foreach(Page::getUniqueMetaValues('pcc_story_organization') as $org)
          <option value="{{ $org }}">{{ $org }}</option>
        @endforeach
      </select>
      <button type="submit">Apply filters</button>
    </form>

    <!-- TODO: Show filtered query if it exists -->

    @if ($stories_query->have_posts())
        <div class="wp-block-group">
            <h2>{{ __('Most recent stories by cooperatives', 'pcc') }}</h2>

            <div class="cards cards--three-columns">
                @while ($stories_query->have_posts())
                    @php $stories_query->the_post() @endphp
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
