@section('panel')

<div class="team text-center">
  <div class="cover" style="background:url('img/event_small/{{$f->eventSmallImage}}'); background-size:cover; height: 250px;">
    <div class="overlay text-center">
      <h3 class="white">{{$f->cost}}</h3>
      <h5 class="light light-white"></h5>
    </div>
  </div>
  <img src="img/user_icons/{{$f->user_picture}}" alt="Team Image" class="avatar">
  <div class="title">
    <h3>{{$f->eventName}}</h3>
  <h5>hosted by {{$f->organization}} at {{$f->eventLocation}}</h5>
  <p>{{date("l F n ", strtotime($f->eventDate))}} from {{date("g:i A", strtotime($f->eventStartTime))}} to {{date("g:i A", strtotime($f->eventEndTime))}}</p>
  <h5 class="muted regular"> {{$f->address}} </h5>
    <h5 class="muted regular">{{$f->category}}</h5>
    <p>{{$f->description}}</p>
  </div>
  @if (is_null($f->eventLink) || ($f->eventLink == ''))
  @else
    @if ($f->eventLevel != 'Free')
    <a href="/events/{{$f->id}}"> <button class="btn btn-blue-fill">Learn More </button></a>
  @else
    <a href="{{$f->eventLink}}"><button class="btn btn-blue-fill"> Learn More </button></a>
    @endif
  @endif
  <!--
  <button class="btn btn-blue-fill" onclick=""><span id='like-btn'> Like </span> </button>
  <button class="btn btn-blue-fill" onclick=""><span id='attend-btn'> Attend </span>  </button>
  <br>
  <div class="likes-and-attends">
  <p>{{$f->likeCount}} likes {{$f->attendingCount}} attending </p>-->
</div>
</div>
@end
