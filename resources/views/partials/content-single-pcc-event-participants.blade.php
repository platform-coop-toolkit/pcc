<div class="entry-content" id="content">
  <ul class="participants participants--three-column">
  @foreach(SinglePccEvent::eventParticipants() as $participant)
    @include('partials/event-participant')
  @endforeach
  </ul>
</div>
