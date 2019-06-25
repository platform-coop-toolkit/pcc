<div class="entry-content" id="content">
  <ul class="participants cards cards--three-columns">
  @foreach(SinglePccEvent::eventParticipants() as $participant)
    @include('partials/event-participant')
  @endforeach
  </ul>
</div>
