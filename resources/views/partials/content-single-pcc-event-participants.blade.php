<div class="entry-content" id="content">
  <ul class="participants">
  @foreach(SinglePccEvent::eventParticipants() as $participant)
    @include('partials/event-participant')
  @endforeach
  </ul>
</div>
