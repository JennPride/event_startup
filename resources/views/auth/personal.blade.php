@extends('layouts.forms')

@section('content')
<a href="profile-choice"> <button class="btn btn-white-fill" style="margin: 2%;"> Back </button> </a>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="team text-center">
        <div class="cover" style="background-color: rgba(255, 255, 255, .9);">
          <div class="overlay text-center">
            <h2>Personal Profile</h2>
          </div>
        </div>
        <form class="form-horizontal" id="eventstartup-form" role="form" method="POST" action="register" enctype="multipart/form-data">
            {{ csrf_field() }}
          <input type="hidden" name="accountType" value="Personal">
          <input type="hidden" name="orgName" value="">
          <input type="hidden" name="adminEmail" value="">
          <input type="hidden" name="category" value="">
            <div class="form-group{{ $errors->has('fName') ? ' has-error' : '' }}">
                <label for="fName" class="col-md-3 control-label">First Name</label>

                <div class="col-md-7">
                    <input id="fName" type="text" class="form-control" name="fName" value="{{ old('fName') }}">

                    @if ($errors->has('fName'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fName') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
    				<div class="form-group{{ $errors->has('lName') ? ' has-error' : '' }}">
    						<label for="lName" class="col-md-3 control-label">Last Name</label>

    						<div class="col-md-7">
    								<input id="lName" type="text" class="form-control" name="lName" value="{{ old('lName') }}">

    								@if ($errors->has('lName'))
    										<span class="help-block">
    												<strong>{{ $errors->first('lName') }}</strong>
    										</span>
    								@endif
    						</div>
    				</div>
    				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    						<label for="name" class="col-md-3 control-label">User Name</label>

    						<div class="col-md-7">
    								<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

    								@if ($errors->has('name'))
    										<span class="help-block">
    												<strong>{{ $errors->first('name') }}</strong>
    										</span>
    								@endif
    						</div>
    				</div>

            <div class="form-group{{ $errors->has('school_id') ? ' has-error' : '' }}">
                <label for="school_id" class="col-md-3 control-label">Your School</label>

                <div class="col-md-7">
                    <select id="school_id" type="text" class="form-control" name="school_id">
                      @foreach ($schools as $s)

                      <option value="{{ $s -> id }}">  {{ $s -> schoolName }} </option>

                      @endforeach
                    </select>
                </div>
            </div>

    				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    						<label for="email" class="col-md-3 control-label">E-Mail Address</label>

    						<div class="col-md-7">
    								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

    								@if ($errors->has('email'))
    										<span class="help-block">
    												<strong>{{ $errors->first('email') }}</strong>
    										</span>
    								@endif
    						</div>
    				</div>

    				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    						<label for="password" class="col-md-3 control-label">Password</label>

    						<div class="col-md-7">
    								<input id="password" type="password" class="form-control" name="password">

    								@if ($errors->has('password'))
    										<span class="help-block">
    												<strong>{{ $errors->first('password') }}</strong>
    										</span>
    								@endif
    						</div>
    				</div>

    				<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    						<label for="password-confirm" class="col-md-3 control-label">Confirm Pass</label>

    						<div class="col-md-7">
    								<input id="password-confirm" type="password" class="form-control" name="password_confirmation">

    								@if ($errors->has('password_confirmation'))
    										<span class="help-block">
    												<strong>{{ $errors->first('password_confirmation') }}</strong>
    										</span>
    								@endif
    						</div>
    				</div>
            <div class="form-group">
              <label class="col-lg-12" >
                <input value="true" type="checkbox" name="newsletter"> Yes, I would love to receive your weekly newsletter with events specific </br> to my campus and interests!
              </label>
          </div>
    				<div class="form-group">
    						<div class="col-sm-offset text-center">
    								<button type="submit" class="btn btn-white-fill">
    										<i class="fa fa-btn fa-user"></i> Register
    								</button>
    						</div>
    				</div>
    		</form>
      </div>
    </div>
  </div>
</div>

<script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#user_image')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@stop
