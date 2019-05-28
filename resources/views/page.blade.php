@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @if(!is_front_page()) @include('partials.page-header') @endif
    @include('partials.content-page')
  @endwhile
@endsection
