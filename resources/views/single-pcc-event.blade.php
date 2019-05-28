@extends('layouts.app')

@section('content')
  <div @php post_class() @endphp>
    @if($post->post_parent)
      @include('partials.session-ribbon')
    @elseif($event_type === 'conference')
      @include('partials.event-ribbon')
    @endif
    <header>
      <section>
        @include('partials/breadcrumb')
        <p class="event-type">{{ $event_type_label }}</p>
        <h1 class="entry-title">{!! App::title() !!}</h1>
      </section>
      @include('partials/event-meta')
    </header>
      @while(have_posts()) @php the_post() @endphp
        @if($event_view)
          @include('partials.content-single-pcc-event-'.$event_view)
        @else
          @include('partials.content-single-pcc-event')
        @endif
      @endwhile
  </div>
@endsection
