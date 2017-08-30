@extends('layouts.app')

@section('navOrForm')
<body style="background: url('../img/header.jpg');
	background-size: cover;
	background-position: center;">
	<div class="preloader">
		<img src="{{ URL::asset('img/loader.gif') }}" alt="Preloader image">
	</div>
	<a href="{{$back}}"> <button class="btn btn-white-fill" style="margin: 2%;"> Back </button> </a>
	<div class="container">
	  <div class="row">
	    <div class="col-md-8 col-md-offset-2">
	      <div class="team text-center" style="border-color: white;">
	        <div class="cover" style="background-color: rgba(255, 255, 255, .9);">
	          <div class="overlay text-center">
	@yield('content')

</body>
@endsection
