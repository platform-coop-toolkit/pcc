<div class="content container">
  <ul class="photocredits">
    @foreach($photo_credits as $photo)
      <li class="photocredit">
        <figure class="photocredit__image">
          {!! wp_get_attachment_image($photo->ID, 'social') !!}
          <figcaption class="photocredit__text">
            {!! $photo->credit !!}
          </figcaption>
        </figure>
      </li>
    @endforeach
  </ul>
</div>
