@extends('layouts.profile')

@section('content')
<section class="profile">
  <div class="container">
    <div class="table">
      <div class="col-lg-12">
        <div class="team text-center" style="background-color: rgba(255, 255, 255, .6);">
          <div class="cover">
            </div>
          <img src="img/user_icons/{{ Auth::user()->user_picture }}" alt="Team Image" class="avatar" width="175">
          <div class="title">
          @if ((count($futureEvents) >= 1) || (count($pastEvents) >= 1))
            @if (count($futureEvents) >= 1)
                <h2 style="font-size: 3em;"> Upcoming Events </h2>
                      @foreach ($futureEvents as $f)
                      <div class="col-md-10 col-md-offset-1">
                        <div class="team text-center">
                          <div class="cover" style="background:url('img/event_small/{{$f->eventSmallImage}}'); background-size:cover; height: 250px;
                          background-position: center;">
                          </div>
                          <div class="title">
                            <h2 style="color: black;">{{$f->eventName}}</h2>
                          <h3>hosted by <b>{{$f->organization}}</b> </h3>
                          <br>
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

                        <a href="/{{ $f -> id }}/edit-event"><button class="btn btn-blue-fill"> Edit Event </button> </a>
                        @if (($f->eventLevel == 'Gold') || ($f->eventLevel == 'Diamond'))
                        <a href="/{{ $f -> id }}/edit-merch"><button class="btn btn-blue-fill"> Edit Merchandise and Tickets </button> </a>
                        @endif
                          <p>{{$f->likeCount}} likes {{$f->attendingCount}} attending </p>
                        </div>
                        </div>
                        </div>
                      @endforeach
            @endif
          @else
            <h3> Awe, you haven't submitted any events! </h3>
          @endif
        </div>
        </div>
      </div>
        </div>
        </div>
</section>

@stop
