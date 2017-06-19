@extends('layouts.forms')

@section('content')
<a href="/"> <button class="btn btn-white-fill" style="margin: 2%;"> Back </button> </a>
<section class="section section-padded">
  <div class="container">
    <div class="row text-center title">
      <h2>Choose A School</h2>
    </div>
    <div class="row services">
    @foreach ($schools as $s)
      <a href="/schools/{{$s->id}}">
      <div class="col-md-6">
        <div class="service">
          <div class="icon-holder">
            <span class="icon"><img src="../img/icons/{{$s->id}}.png" style="height: 5em;" alt="{{$s->schoolName}} Logo copyright {{$s->schoolName}}"></span>
          </div>
          <h3 class="heading">{{$s->schoolName}}</h3>
          <p class="description">See what's coming up at {{$s->schoolName}}</p>
        </div>
      </div>
        </a>
@endforeach
<a href="suggestion-form">
<div class="col-md-6">
  <div class="service">
    <div class="icon-holder">
      <span class="icon"><i class="fa fa-frown-o" id="icon"></i></span>
    </div>
    <h3 class="heading">Don't see your school?</h3>
    <p class="description">Suggest it to us</p>
  </div>
</div>
  </a>
  </div>
</div>
  <div class="cut cut-bottom"></div>

</section>

@stop
