@extends('layouts.forms')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="team text-center">
        <div class="cover">
          <div class="overlay text-center">
            <h2>Organization Profile</h2>
          </div>
        </div>
        <form class="form-horizontal" id="eventstartup-form" role="form" method="POST" action="register" enctype="multipart/form-data">
            {{ csrf_field() }}
          <input type="hidden" class="accountType" value="Organization">
					<div class="form-group{{ $errors->has('orgName') ? ' has-error' : '' }}">
							<label for="name" class="col-md-3 control-label">Organization Name</label>

							<div class="col-md-7">
									<input id="orgName" type="text" class="form-control" name="orgName" value="{{ old('orgName') }}">

									@if ($errors->has('orgName'))
											<span class="help-block">
													<strong>{{ $errors->first('orgName') }}</strong>
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
					<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
							<label for="category" class="col-md-3 control-label">Category</label>
							<div class="col-md-7">
								<select name="category" class="form-control">
									<option value="Academic"> Academic </option>
									<option value="Advocacy"> Advocacy </option>
									<option value="Service"> Service </option>
									<option value="Cultural"> Cultural </option>
									<option value="Departmental"> Departmental </option>
									<option value="Governing Bodies"> Governing Bodies </option>
									<option value="Greek"> Greek </option>
									<option value="Group Council"> Group Council </option>
									<option value="Honors"> Honors </option>
									<option value="Intramural"> Intramuralc </option>
									<option value="Media"> Media </option>
									<option value="Military"> Military </option>
									<option value="Performing Groups"> Performing Groups </option>
									<option value="Political"> Political </option>
									<option value="Recreation"> Recreation </option>
									<option value="Religious"> Religious </option>
									<option value="Social"> Social </option>
									<option value="Sports"> Sports </option>
								</select>
									@if ($errors->has('category'))
											<span class="help-block">
													<strong>{{ $errors->first('category') }}</strong>
											</span>
									@endif
							</div>
					</div>
    				<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    						<label for="city" class="col-md-3 control-label">City</label>

    						<div class="col-md-7">
    								<input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">

    								@if ($errors->has('city'))
    										<span class="help-block">
    												<strong>{{ $errors->first('city') }}</strong>
    										</span>
    								@endif
    						</div>
    				</div>

    				<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
    						<label for="state" class="col-md-3 control-label">State</label>

    						<div class="col-md-7">
    								<input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}">

    								@if ($errors->has('state'))
    										<span class="help-block">
    												<strong>{{ $errors->first('state') }}</strong>
    										</span>
    								@endif
    						</div>
    				</div>
    				<div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
    						<label for="zipcode" class="col-md-3 control-label">Zipcode</label>

    						<div class="col-md-7">
    								<input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}">
    								@if ($errors->has('zipcode'))
    										<span class="help-block">
    												<strong>{{ $errors->first('zipcode') }}</strong>
    										</span>
    								@endif
    						</div>
    				</div>

            <div class="form-group{{ $errors->has('user_image') ? ' has-error' : '' }}">

              <label for="user_image" class="col-md-3 control-label">Organization Image </label>
                <div class="col-md-7">
                  <label class="btn btn-default btn-white-fill">
                      Browse <input type="file" onchange="readURL(this);" style="display: none;" name='user_image'>
                  </label>
                </br>
              </br>
                  <img id="user_image" src="#" alt="User Icon"  />

                    @if ($errors->has('user_image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('user_image') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>

            <div class="form-group{{ $errors->has('school_id') ? ' has-error' : '' }}">
                <label for="school_id" class="col-md-3 control-label">School</label>

                <div class="col-md-7">
                  <input id="school_id" type="text" class="form-control" name="school_id" value="{{$s->schoolName}}">
                </div>
            </div>
    				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    						<label for="email" class="col-md-3 control-label">Admin E-Mail</label>

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
    						<div class="col-sm-offset text-center">
    								<button type="submit" class="btn btn-blue-fill">
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
