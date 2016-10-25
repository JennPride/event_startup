@extends('layouts.app')

@section('content')
<header id="intro">
  <div class="container">
    <div class="table">
      <div class="header-text">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 class="white typed">Thanks for the submission!</h1>
            <span class="typed-cursor">|</span>
            <h4 class="light white">{{$message}}</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

@endsection
