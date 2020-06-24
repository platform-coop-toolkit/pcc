@extends('layouts.app')
@section('content')
@include('partials.page-header-stories')
<div id="content" class="pcc-story">
  @if (have_posts())
      <div class="wp-block-group">
          <div class="cards cards--three-columns">
              @while (have_posts())
                  @php the_post() @endphp
                  @include('partials.content-page-stories')
              @endWhile
            </div>
      </div>
  @else
      No Stories.
  @endif
</div>
@endsection
