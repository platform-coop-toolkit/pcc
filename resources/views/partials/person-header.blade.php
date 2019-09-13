<div class="page-header @if(has_post_thumbnail()) page-header--media @endif">
  <div class="page-header__inside">
    @if(has_post_thumbnail())
    <figure class="page-header__media">
        @thumbnail('banner')
    </figure>
    @endif
    <div class="page-header__content">
      @if(!is_404())
        @include('partials/breadcrumb')
      @endif
      <h1>{!! App::title() !!}</h1>
      @if($participant_data['title'] && $participant_data['organization'] && $participant_data['organization_link'])
      <p class="title">{{ $participant_data['title'] }}, <a href="{{ $participant_data['organization_link'] }}">{{ $participant_data['organization'] }}</a>
      </p>
      @elseif($participant_data['title'] && $participant_data['organization'])
      <p class="title">{{ $participant_data['title'] }}, {{ $participant_data['organization'] }}
      </p>
      @elseif($participant_data['title'])
      <p class="title">{{ $participant_data['title'] }}</p>
      @endif
      @if($participant_data['twitter_username'])
      <p class="twitter"><a href="https://twitter.com/{{ str_replace('@', '', $participant_data['twitter_username']) }}">{{ $participant_data['twitter_username'] }}</a></p>
      @endif
    </div>
    @if(has_post_thumbnail())
      <div class="fold">
        @svg('fold', ['aria-hidden' => 'true'])
      </div>
    @endif
  </div>
</div>
