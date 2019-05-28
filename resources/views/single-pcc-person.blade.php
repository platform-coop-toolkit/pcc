@extends('layouts.app')

@section('content')
  <div @php post_class() @endphp>
    @if($event && $event_type === 'conference')
      @include('partials.participant-ribbon')
    @endif
    <header>
      <section>
        @include('partials/breadcrumb')
        <h1 class="entry-title">{!! App::title() !!}</h1>
      </section>
    </header>
      @while(have_posts()) @php the_post() @endphp
        @if($event)
          @include('partials.content-single-pcc-person-participant')
        @else
          @include('partials.content-single-pcc-person')
        @endif
      @endwhile
  </div>
@endsection
