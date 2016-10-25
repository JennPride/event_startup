@extends('layouts.forms')


@section('content')


<a href="/"> <button class="btn btn-white-fill" style="margin: 2%;"> Back </button> </a>
<div class="cut cut-top"></div>
<section class="section section-padded">
  <div class="container">
    <div class="row text-center title">
      <h2>Choose Your Profile Type</h2>
    </div>
    <div class="row services">
        <a href="personal">
      <div class="col-md-4">
        <div class="service">
          <div class="icon-holder">
            <span class="icon"><i class="fa fa-user" id="icon"></i></span>
          </div>
          <h4 class="heading">Personal</h4>
          <p class="description">Best for students and
          faculty to find events,  leave comments, and see what is happening around campus.</p>

        </div>
      </div>
        </a>
        <a href="organization">
      <div class="col-md-4">
        <div class="service">
          <div class="icon-holder">
            <span class="icon"><i class="fa fa-users" id="icon"></i></span>
          </div>
          <h4 class="heading">Organization</h4>
          <p class="description">Best for school organizations to post events and gain a following. </p>
        </div>
      </div>
    </a>
    <a href="company">
      <div class="col-md-4">
        <div class="service">
          <div class="icon-holder">
            <span class="icon"><i class="fa fa-suitcase" id="icon"></i></span>
          </div>
          <h4 class="heading">Company</h4>
          <p class="description"> Best for companies around campus or looking to reach out to
          college students and communities. </p>
      </div>
    </div>
  </a>
</div>
  </div>
  <div class="cut cut-bottom"></div>
</section>

@stop
