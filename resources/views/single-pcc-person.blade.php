@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.person-header')
    @if($event)
      @include('partials.content-single-pcc-person-participant')
    @else
      @include('partials.content-single-pcc-person')
    @endif
  @endwhile
@endsection
