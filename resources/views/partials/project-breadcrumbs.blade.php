<div class="project-breadcrumbs">
  <p class="breadcrumb">
    <a href="/">{{ __('Home', 'pcc') }}</a>
    <a href="/who-we-are/icde">{{ __('ICDE', 'pcc') }}</a>
    @if($post->post_parent)
     <a href="/{{ get_post($post->post_parent)->post_name }}">{{ get_post($post->post_parent)->post_title }}</a>
     <a href="#">{{ $post->post_title }}</a>
    @else
      <a href="#">{{ $post->post_title }}</a>
    @endif
  </p>
</div>
