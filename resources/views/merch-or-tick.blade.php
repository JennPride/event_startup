@extends('layouts.forms')


@section('content')

<section class="section section-padded">
  <div class="cut cut-top"></div>
  <div class="container">
    <div class="row text-center title">
      <h2>What would you like to sell?</h2>
    </div>
    <div class="row services">
        <a href="merch-form">
      <div class="col-md-6">
        <div class="service">
          <div class="icon-holder">
            <span class="icon"><i class="fa fa-shopping-cart" id="icon"></i></span>
          </div>
          <h4 class="heading">Merchandise</h4>
          <p class="description">Submit any and all merchandise you want to sell for your event - must be a standalone purchase (i.e. does not come with an event ticket)
        </div>
      </div>
        </a>
        <a href="{{$event->id}}/ticket-form">
      <div class="col-md-6">
        <div class="service">
          <div class="icon-holder">
            <span class="icon"><i class="fa fa-ticket" id="icon"></i></span>
          </div>
          <h4 class="heading">Tickets</h4>
          <p class="description">Submit any and all tickets you want to sell for your event - for different ticket types you may need to fill out this form multiple times</p>
        </div>
      </div>
    </a>
</div>
  </div>
  <div class="cut cut-bottom"></div>
</section>

@stop
