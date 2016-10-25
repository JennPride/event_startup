@extends('layouts.personalized')


@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="event">
        <div class="cover" style="background:url('../img/event_small/{{$event->eventSmallImage}}'); background-size:cover;
        background-position: center; height: 200px;">
        </div>
        <br>
        <h1> {{ $event->eventName }}</h1>
        <hr>
        <h2> About the Event </h2>
        <p> Category : {{$event->category}} </p>
        <p> When : {{date("l F n ", strtotime($event->eventDate))}} from {{date("g:i A", strtotime($event->eventStartTime))}} to {{date("g:i A", strtotime($event->eventEndTime))}}</p>
        <p> Where : {{$event->eventLocation}} at {{$event->address}} </p>
        <p> What : {{$event->longDescription}} </p>
        @if (is_null($event->cost) || ($event->cost == ''))
        <p> Cost : Free </p>
        @else
        <p> Cost : {{$event->cost}} </p>
        @endif
        @if (is_null($event->eventLargeImage) || ($event->eventLargeImage == ''))
        @else
        <img src="../img/event_large/{{$f->eventLargeImage}}" alt="{{$event->eventName }} image" class="">
        @endif
        <h2 style="color: black;"> About the Organization </h2>
        <h3> {{$org->orgName }} </h3>
        <img src="../img/user_icons/{{$org->user_picture}}" alt="Organization Image" class="avatar" style="margin: 2%;">
        <p> Organization Type : {{$org->org_type}} </p>
        <p> {{$event->orgDescription}} </p>
        <ul class="contact-icons">
          <li><i class="fa fa-envelope"></i></li>
        </ul>
        @if (is_null($event->orgLink) || ($event->orgLink == ''))
        @else
        @endif
			    </div>
			    </div>
			     </div>
			    </div>
@stop
