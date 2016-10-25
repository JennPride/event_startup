@extends('layouts.app')


@section('content')

<section class="section section-padded" id="sign-up-form" style="background: url('../img/header.jpg');
background-size: cover;
background-position: center;">
	<div class="container" >
		<div class="col-md-12 text-center">
			<br>
			<h1>Personal Profile</h1>
		</div>
		<br>
		<div class="row services">
			<div class="col-md-11">
					<form class="form-horizontal" role="form" method="POST" id="sign-up-form" action="{{ url('/register') }}">
							{{ csrf_field() }}
						<input type="hidden" class="accountType" value="personal">

							<div class="form-group{{ $errors->has('fName') ? ' has-error' : '' }}">
									<label for="fName" class="col-md-4 control-label">First Name</label>

									<div class="col-md-6">
											<input id="fName" type="text" class="form-control" name="fName" value="{{ old('fName') }}">

											@if ($errors->has('fName'))
													<span class="help-block">
															<strong>{{ $errors->first('fName') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group{{ $errors->has('lName') ? ' has-error' : '' }}">
									<label for="lName" class="col-md-4 control-label">Last Name</label>

									<div class="col-md-6">
											<input id="lName" type="text" class="form-control" name="lName" value="{{ old('lName') }}">

											@if ($errors->has('lName'))
													<span class="help-block">
															<strong>{{ $errors->first('lName') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
									<label for="name" class="col-md-4 control-label">User Name</label>

									<div class="col-md-6">
											<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

											@if ($errors->has('name'))
													<span class="help-block">
															<strong>{{ $errors->first('name') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
									<label for="city" class="col-md-4 control-label">City</label>

									<div class="col-md-6">
											<input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">

											@if ($errors->has('city'))
													<span class="help-block">
															<strong>{{ $errors->first('city') }}</strong>
													</span>
											@endif
									</div>
							</div>

							<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
									<label for="state" class="col-md-4 control-label">State</label>

									<div class="col-md-6">
											<input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}">

											@if ($errors->has('state'))
													<span class="help-block">
															<strong>{{ $errors->first('state') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
									<label for="zipcode" class="col-md-4 control-label">Zipcode</label>

									<div class="col-md-6">
											<input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}">
											@if ($errors->has('zipcode'))
													<span class="help-block">
															<strong>{{ $errors->first('zipcode') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group{{ $errors->has('school_id') ? ' has-error' : '' }}">
									<label for="school_id" class="col-md-4 control-label">Your School</label>

									<div class="col-md-6">
											<select id="school_id" type="text" class="form-control" name="school_id">
												@foreach ($schools as $s)

												<option value="{{ $s -> id }}">  {{ $s -> schoolName }} </option>

												@endforeach
											</select>
									</div>
							</div>
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<label for="email" class="col-md-4 control-label">E-Mail Address</label>

									<div class="col-md-6">
											<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

											@if ($errors->has('email'))
													<span class="help-block">
															<strong>{{ $errors->first('email') }}</strong>
													</span>
											@endif
									</div>
							</div>

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<label for="password" class="col-md-4 control-label">Password</label>

									<div class="col-md-6">
											<input id="password" type="password" class="form-control" name="password">

											@if ($errors->has('password'))
													<span class="help-block">
															<strong>{{ $errors->first('password') }}</strong>
													</span>
											@endif
									</div>
							</div>

							<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
									<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

									<div class="col-md-6">
											<input id="password-confirm" type="password" class="form-control" name="password_confirmation">

											@if ($errors->has('password_confirmation'))
													<span class="help-block">
															<strong>{{ $errors->first('password_confirmation') }}</strong>
													</span>
											@endif
									</div>
							</div>

							<div class="form-group">
									<div class="col-md-6 col-md-offset-4">
											<button type="submit" class="btn btn-blue-fill">
													<i class="fa fa-btn fa-user"></i> Register
											</button>
									</div>
							</div>
					</form>
			</div>
		</div>
	</div>
</section>

@stop
