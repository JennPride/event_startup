<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Summer Startup</title>
	<!-- Favicons (created with http://realfavicongenerator.net/)-->
	<!-- Favicons (created with http://realfavicongenerator.net/)-->
	<link rel="apple-touch-icon" sizes="57x57" href="{{ URL::asset('img/favicons/apple-touch-icon-57x57.png') }}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('img/favicons/apple-touch-icon-60x60.png') }}">
	<link rel="icon" type="image/png" href="{{ URL::asset('img/favicons/favicon-32x32.png') }}" sizes="32x32">
	<link rel="icon" type="image/png" href="{{ URL::asset('img/favicons/favicon-16x16.png') }}" sizes="16x16">
	<link rel="manifest" href="{{ URL::asset('img/favicons/manifest.json') }}">
	<link rel="shortcut icon" href="{{ URL::asset('img/favicons/favicon.icon') }}">
	<meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/normalize.css') }}">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css') }}">
	<!-- Owl -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/owl.css') }}">
	<!-- Animate.css -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/animate.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('fonts/font-awesome-4.1.0/css/font-awesome.min.css') }}">
	<!-- Elegant Icons -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('fonts/eleganticons/et-icons.css') }}">
	<!-- Main style -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/cardio.css') }}">

	<script src="{{ URL::asset('scripts/jquery.js') }}"></script>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

</head>

<body>
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
    @yield('content')


		    <!-- JavaScripts -->
				<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.css"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
		    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
		    <script src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
		    <script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
		    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
		    <script src="{{ URL::asset('js/wow.min.js') }}"></script>
		    <script src="{{ URL::asset('js/typewriter.js') }}"></script>
		    <script src="{{ URL::asset('js/jquery.onepagenav.js') }}"></script>
		    <script src="{{ URL::asset('js/main.js') }}"></script>
</body>
</html>
