<div class="col-md-10 col-md-offset-1">
  <div class="team text-center">
    <div class="cover" style="background:url('img/event_small/{{$f->eventSmallImage}}'); background-size:cover; height: 250px;
    background-position: center;">
    </div>
    <div class="title">
    <h2 style="color: black;">{{$f->eventName}}</h2>
    <p><b>Category: </b>{{$f->category}}</p>
    <p><b>Where: </b> {{$f->eventLocation}} </p>
    <p><b>Address: </b> {{$f->address}} </p>
    <p><b>When: </b>{{date("l F n ", strtotime($f->eventDate))}} from {{date("g:i A", strtotime($f->eventStartTime))}} to {{date("g:i A", strtotime($f->eventEndTime))}}</p>
    <p><b>What: </b>{{$f->description}}</p>
    @if (is_null($f->cost) || ($f->cost == ''))
    <p> <b>Cost: </b>Free </p>
    @else
    <p><b>Cost: </b>{{$f->cost}}</p>
    @endif
    <a href="/{{ $f -> id }}/edit-event"><button class="btn btn-blue-fill"> Edit Event</button></a>
  </div>
</div>
</div>
