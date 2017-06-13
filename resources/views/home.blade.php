@extends('layouts.app')

@section('content')


<header id="intro" style="background: url('../img/{{$school->id}}.jpg');">
  <div class="container">
    <div class="table">
      <div class="header-text">
        <div class="row">
          <div class="col-md-12 text-center">
            <h3 class="light white">Welcome back, {{ Auth::user()->name }}!</h3>
            <h1 class="white typed">Upcoming {{ $school->schoolName }} Events</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

  @if (count($featured) >= 1)
  <section id="services" class="section section-padded">
    <div class="cut cut-top"></div>
    <div class="container">
      <div class="row text-center title">
        <h2>Featured</h2>
        <h4 class="light muted">These are popular events coming to {{$school->schoolName}} soon!</h4>
      </div>
      <div class="row">
        @foreach ($featured as $f)
        <div class="col-lg-12">
          <div class="team text-center">
            <div class="cover" style="background:url('img/event_small/{{$f->eventSmallImage}}'); background-size:cover; height: 250px;">
            </div>
            @if (is_null($f->user_picture) || ($f->user_picture == ""))
            @else
            <img src="img/user_icons/{{$f->user_picture}}" alt="Organization Image" class="avatar">
            @endif
            <div class="title">
              <h3>{{$f->eventName}}</h3>
            <h5>hosted by {{$f->organization}} at {{$f->eventLocation}}</h5>
            <p>{{date("l F n ", strtotime($f->eventDate))}} from {{date("g:i A", strtotime($f->eventStartTime))}} to {{date("g:i A", strtotime($f->eventEndTime))}}</p>
            <h5 class="muted regular"> {{$f->address}} </h5>
              <h5 class="muted regular">{{$f->category}}</h5>
              <p>{{$f->description}}</p>
            </div>
            @if ($f->eventLevel != 'Free')
              <a href="/events/{{$f->id}}"> <button class="btn btn-blue-fill">Learn More </button></a>
            @elseif (is_null($f->eventLink) || ($f->eventLink == ''))
            @else
            <a href="{{$f->eventLink}}"><button class="btn btn-blue-fill"> Learn More </button></a>
            @endif
            <!--
            <button class="btn btn-blue-fill" onclick=""><span id='like-btn'> Like </span> </button>
            <button class="btn btn-blue-fill" onclick=""><span id='attend-btn'> Attend </span>  </button>
            <br>
            <div class="likes-and-attends">
            <p>{{$f->likeCount}} likes {{$f->attendingCount}} attending </p>-->
          </div>
          </div>
        </div>
        @endforeach
      </div>
      </div>
</section>
@endif

<section>
    <div class="team text-center" style="border-style: none">
    <div class="cover">
      <div class="overlay text-center">
        <h2>What Are You Looking For?</h2>
      </div>
    </div>
    <form class="form-horizontal" id="eventstartup-form" role="form" method="GET" action="event-search" style="color: black;">
      <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
          <label for="category" class="col-md-3 control-label">Category</label>
          <div class="col-md-7">
            <select name="category" class="form-control">
              <option value="All"> All </option>
              @foreach ($categories as $c)
              <option value="$c"> {{$c}} </option>
              @endforeach
            </select>
          </div>
      </div>
    <div class="form-group">
      <label for="startDate" class="col-md-3 control-label"> From: </label>
      <div class="col-md-7">
      <input type="date" name="startDate" class="form-control"></input>
    </div>
    </div>
    <div class="form-group">
      <label for="endDate" class="col-md-3 control-label"> To: </label>
      <div class="col-md-7">
      <input type="date" name="endDate" class="form-control"></input>
    </div>
    </div>
    <div class="form-group{{ $errors->has('startTime') ? ' has-error' : '' }}">
        <label for="startTime" class="col-md-3 control-label">Start Time</label>
        <div class="col-md-7">
          <select name="startTime" class="form-control">
            <option value=""> Any Time </option>
            <option value="11:00:00"> Morning </option>
            <option value="17:00:00"> Afternoon </option>
            <option value="23:00:00"> Evening </option>
          </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset text-center">
            <button type="submit" class="btn btn-blue-fill">
                Search
            </button>
        </div>
    </div>
    </form>
  </div>
  <div class="team text-center" style="border-style: none">
  <div>
    <ul id="map-labels">
      <li><i class="fa fa-futbol-o" style="color: rgb(254, 118, 106);"></i> Athletic</li>
      <li><i class="fa fa-music" style="color: rgb(150, 235, 126);"></i> Music</li>
      <li><i class="fa fa-users" style="color: rgb(196, 147, 248);"></i> Performance</li>
      <li><i class="fa fa-picture-o" style="color: rgb(0, 191, 1);"></i> Exhibit</li><br>
      <li><i class="fa fa-university" style="color: rgb(255, 237, 93);"></i> Education</li>
      <li><i class="fa fa-cutlery" style="color: rgb(248, 140, 7);"></i> Food</li>
      <li><i class="fa fa-bicycle" style="color: rgb(189, 225, 253)"></i> Recreation</li>
      <li><i class="fa fa-briefcase" style="color: rgb(107, 150, 255);"></i> Career</li>
    </ul>
  </div>
</div>
  @if (count($events) >= 1)
  <div class="row">
      <div class="col-md-10 col-md-offset-1" id="map-container">
      <div id="map" class="center-block"></div>
      </div>
  </div>
      @foreach ($events as $f)
      <div class="col-md-10 col-md-offset-1">
        <div class="team text-center">
          <div class="cover" style="background:url('img/event_small/{{$f->eventSmallImage}}'); background-size:cover; height: 250px;
        	background-position: center;">
          </div>
          @if (is_null($f->user_picture) || ($f->user_picture == ""))
          @else
          <img src="img/user_icons/{{$e->user_picture}}" alt="Organization Image" class="avatar">
          @endif
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
        </div>
          @if (is_null($f->eventLink) || ($f->eventLink == ''))
          @else
            @if ($f->eventLevel != 'Free')
            <a href="/events/{{$f->event_id}}"> <button class="btn btn-blue-fill">Learn More </button></a>
            @else
            <a href="{{$f->eventLink}}"><button class="btn btn-blue-fill"> Learn More </button></a>
            @endif
          @endif
        </form>
          <!--<button class="btn btn-blue-fill" ><span id='like-btn'> Like </span> </button>
          <button class="btn btn-blue-fill" onclick=""><span id='attend-btn'> Attend </span>  </button>
          <br>
          <div class="likes-and-attends">
          <p>{{$f->likeCount}} likes {{$f->attendingCount}} attending </p>
        </div>-->
        </div>
      </div>
      @endforeach
      @else
      <div class="team text-center" style="border-style: none">
        <div class="cover">
          <div class="overlay text-center">
            <h2><i  class="fa fa-frown-o" aria-hidden="true"></i></h2>
          </div>
        </div>
        <h3>We're sorry</h3>
        <p> We couldn't find any events. Wanna try searching something else? </p>
      </div>
      @endif
  </section>


<script>
$(document).ready(function() {
  $('#like-form').submit(function(e){
    alert('trying');
    e.preventDefault();
    var url = 'localhost:8000/likeEvent';
    $.ajax({
          type:'POST',
          url: url,
          data: {user_id : 18, event_id : 18},
          datatype: 'JSON',
          success: function(){
             alert('It worked');
          }
       });

  });

});
</script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD5sa0JLfdZXg9rq1DUOivGcdAuhIZ-UA&callback=initMap"
    async defer></script>
      <script>

      var coordinates = [
      @foreach ($events as $e)
      ["{{ $e->locationLat }}", "{{ $e->locationLng }}"],
      @endforeach
      ];
      var labels = [
        @foreach ($events as $e)
        ["<div class='info-box'> <h6> {{$e->eventName}} </h6><p><b>Where: </b>{{$e->eventLocation}}</p><p><b>When: </b> {{date("l F n ", strtotime($e->eventDate))}} from {{date("g:i A", strtotime($e->eventStartTime))}} to {{date("g:i A", strtotime($e->eventEndTime))}}</p> </div>"]
        @endforeach
      ]
      var categories = [
        @foreach ($events as $e)
        ["img/icons/{{$e->category}}.png"]
        @endforeach
      ]

        function initMap() {
          var mapDiv = document.getElementById('map');
          var map = new google.maps.Map(mapDiv, {
            center: {lat: 38.98676, lng: -76.942619},
            zoom: 15
          });
          for( i=0; i < coordinates.length; i++) {
            var location = new google.maps.LatLng(coordinates[i][0], coordinates[i][1]);
            var infowindow = new google.maps.InfoWindow({
               content: labels[i][0],
            });
            var marker = new google.maps.Marker({
              position: location,
              map:map,
              animation: google.maps.Animation.DROP,
              icon: categories[i][0],
            });
            marker.addListener('click', function() {
              infowindow.open(map, marker);
            });
          }
          }
      </script>

@stop
