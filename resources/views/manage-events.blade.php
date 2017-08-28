@extends('layouts.profile')

@section('content')
<section class="profile">
  <div class="container">
    <div class="table">
      <div class="col-lg-12">
        <div class="team text-center" style="background-color: white;">
          <div class="cover">
          @if (Auth::user()->user_picture != '')
          <img src="img/user_icons/{{ Auth::user()->user_picture }}" alt="Team Image" class="avatar" width="175">
          @endif
          <h3>{{ Auth::user()->name }}</h3>
          <br>
          @if ((count($futureEvents) >= 1) || (count($pastEvents) >= 1))
            @if (count($futureEvents) >= 1)
                <h1> Upcoming Events </h1>
                      @foreach ($futureEvents as $f)
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
                      @endforeach
            @endif
          <!-- @if (count($pastEvents) >= 1)
            <h1> Past Events </h1>
                @foreach ($pastEvents as $p)
                <div class="col-md-10 col-md-offset-1">
                  <div class="team text-center">
                    <div class="cover" style="background:url('img/event_small/{{$p->eventSmallImage}}'); background-size:cover; height: 250px;
                    background-position: center;">
                    </div>
                    <div class="title">
                      <h2 style="color: black;">{{$p->eventName}}</h2>
                    <h3>hosted by <b>{{$p->organization}}</b> </h3>
                    <br>
                    <p><b>Category: </b>{{$p->category}}</p>
                    <p><b>Where: </b> {{$p->eventLocation}} </p>
                    <p><b>Address: </b> {{$p->address}} </p>
                    <p><b>When: </b>{{date("l F n ", strtotime($p->eventDate))}} from {{date("g:i A", strtotime($p->eventStartTime))}} to {{date("g:i A", strtotime($p->eventEndTime))}}</p>
                    <p><b>What: </b>{{$p->description}}</p>
                    @if (is_null($p->cost) || ($p->cost == ''))
                    <p> <b>Cost: </b>Free </p>
                    @else
                    <p><b>Cost: </b>{{$p->cost}}</p>
                    @endif
                  </div>
                  </div>
                  </div>
                @endforeach
              @endif
            @else
            <h3> Awe, you haven't submitted any events! </h3>
          @endif -->
        </div>
        <button class="btn btn-blue-fill" onclick="topFunction()" id="top" title="Go to top">Back to Top</button>
      </div>
        </div>
        </div>
      </div>
</section>

@stop

<script>
function topFunction() {
    document.body.scrollTop = 0; // For Chrome, Safari and Opera
    document.documentElement.scrollTop = 0; // For IE and Firefox
}
</script>
