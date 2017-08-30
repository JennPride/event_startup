@extends('layouts.app')

@section('navOrForm')
<div class="preloader">
  <img src="{{ URL::asset('img/loader.gif') }}" alt="Preloader image">
</div>
<nav class="navbar">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right main-nav">
        @if (Auth::user())
        <li><a href="{{ url('/home') }}">Home</a></li>
        @endif
        <li><a href="{{ url('/schools')}}">Schools</a></li>
        <li><a href="{{ url('/about') }}">About</a></li>
        <li><a href="{{ url('/contact') }}">Contact</a></li>
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/profile-choice') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  @if (Auth::user()->accountType == "Organization")
                    <li><a href="{{ url('/submit-event') }}"><i class="fa fa-paper-plane-o"></i>   Submit Event</a></li>
                    <li><a href="{{ url('/manage-events') }}"><i class="fa fa-wrench"></i>   Manage Your Events</a></li>
                  @endif
                    <li><a href="{{ url('/profile') }}"><i class="fa fa-user"></i>   Profile </a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>   Logout</a></li>
                </ul>
            </li>
        @endif
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>

<!-- Holder for mobile navigation -->
<div class="mobile-nav">
  <ul>
  </ul>
  <a href="#" class="close-link"><i class="arrow_up"></i></a>
</div>

@endsection

@yield('content')
