<div class="person card">
  <figure class="person__image">
    @if(has_post_thumbnail())
      {!! wp_get_attachment_image(get_post_thumbnail_id(), 'person-desktop') !!}
    @else
      <div class="placeholder-wrap">
        @svg('mark', ['class' => 'placeholder'])
      </div>
    @endif
  </figure>
  <div class="person__details text">
    <p class="person__name title">
      <a href="{{ get_permalink() }}">{!! get_the_title() !!} @svg('chevron-right', ['aria-hidden' => 'true', 'viewbox' => '0 0 5.93335 9.85001'])</a>
      @if(get_post_meta(get_the_ID(), 'pcc_person_short_title', true))
      <span class="person__title">
        {{ get_post_meta(get_the_ID(), 'pcc_person_short_title', true) }}
      </span>
      @endif
    </p>
    @if(wp_get_object_terms(get_the_ID(), 'post_tag', ['fields' => 'names']))
    <p class="person__topics">
      {{ __('Topics:', 'pcc') }} @php
      $post_tags = get_the_tags();
      $separator = ', ';
      if (!empty($post_tags)) {
          foreach ($post_tags as $tag) {
              $output .= $tag->name . $separator;
          }
          echo trim($output, $separator);
      }
      @endphp
    </p>
    @endif
  </div>
</div>
