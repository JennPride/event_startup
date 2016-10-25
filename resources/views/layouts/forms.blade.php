<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Summer Startup</title>
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

</head>

<body style="background: url('../img/header.jpg');
	background-size: cover;
	background-position: center;">
	<div class="preloader">
		<img src="{{ URL::asset('img/loader.gif') }}" alt="Preloader image">
	</div>

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
