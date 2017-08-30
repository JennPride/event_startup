@extends('layouts.forms')

@section('content')
<a href="profile"> <button class="btn btn-white-fill" style="margin: 2%;"> Back </button> </a>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="team text-center">
        <div class="cover" style="background-color: rgba(255, 255, 255, .9);">
          <div class="overlay text-center">
            <h2>{{Auth::user()->name }}</h2>
          </div>
        </div>
        <form class="form-horizontal" id="eventstartup-form" role="form" method="POST" action="submit-edit-profile" enctype="multipart/form-data" >
            {{ csrf_field() }}
          <input type="hidden" name="accountType" value="Personal">
          <input type="hidden" name="orgName" value="">
          <input type="hidden" name="adminEmail" value="">
          <input type="hidden" name="category" value="">
          @if(Auth::user()->accountType == "Personal")
            <div class="form-group{{ $errors->has('fName') ? ' has-error' : '' }}">
                <label for="fName" class="col-md-3 control-label">First Name</label>

                <div class="col-md-7">
                    <input id="fName" type="text" class="form-control" name="fName" value="{{Auth::user()->fName}}">

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
    								<input id="lName" type="text" class="form-control" name="lName" value="{{Auth::user()->lName}}">

    								@if ($errors->has('lName'))
    										<span class="help-block">
    												<strong>{{ $errors->first('lName') }}</strong>
    										</span>
    								@endif
    						</div>
    				</div>
            @else
            <div class="form-group{{ $errors->has('orgName') ? ' has-error' : '' }}">
                <label for="orgName" class="col-md-3 control-label">Organization Name</label>

                <div class="col-md-7">
                    <input id="orgName" type="text" class="form-control" name="orgName" value="{{Auth::user()->orgName}}">
                </div>
            </div>
            <div class="form-group{{ $errors->has('school_id') ? ' has-error' : '' }}">
                <label for="school_id" class="col-md-3 control-label">Your School</label>

                <div class="col-md-7">
                  <input id="school_id" type="text" class="form-control" name="school_id" value="{{$school->schoolName}}" disabled="true">
                </div>
            </div>

    				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    						<label for="email" class="col-md-3 control-label">E-Mail Address</label>

    						<div class="col-md-7">
    								<input id="email" type="email" class="form-control" name="email" value="{{Auth::user()->email}}">

    								@if ($errors->has('email'))
    										<span class="help-block">
    												<strong>{{ $errors->first('email') }}</strong>
    										</span>
    								@endif
    						</div>
    				</div>
            @if(Auth::user()->accountType == "Organization")
            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
  							<label for="category" class="col-md-3 control-label">Category</label>
  							<div class="col-md-7">
  								<select name="category" class="form-control" value="{{Auth::user()->org_type}}" select="{{Auth::user()->org_type}}">
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
            <div class="form-group{{ $errors->has('adminEmail') ? ' has-error' : '' }}">
                <label for="adminEmail" class="col-md-3 control-label">Admin Email</label>

                <div class="col-md-7">
                    <input id="adminEmail type="text" class="form-control" name="adminEmail" value="{{Auth::user()->adminEmail}}">
                </div>
            </div>
            <div class="form-group{{ $errors->has('fName') ? ' has-error' : '' }}">
                <label for="fName" class="col-md-3 control-label">Admin First Name</label>

                <div class="col-md-7">
                    <input id="fName" type="text" class="form-control" name="fName" value="{{Auth::user()->fName}}">

                    @if ($errors->has('fName'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fName') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('lName') ? ' has-error' : '' }}">
                <label for="lName" class="col-md-3 control-label">Admin Last Name</label>

                <div class="col-md-7">
                    <input id="lName" type="text" class="form-control" name="lName" value="{{Auth::user()->lName}}">

                    @if ($errors->has('lName'))
                        <span class="help-block">
                            <strong>{{ $errors->first('lName') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            @endif
            <div class="form-group{{ $errors->has('user_image') ? ' has-error' : '' }}">
              <label for="user_image" class="col-md-3 control-label">User Picture </label>
                <div class="col-md-7">
                  <label class="btn btn-default btn-white-fill">
                      Browse <input type="file" onchange="readURL(this);" style="display: none;" name='user_image'>
                  </label>
                </br>
              </br>
                  <img id="user_image" src="img/user_icons/{{ Auth::user()->user_picture}}" alt="Icon Preview" width=200 height=200/>
                  </div>
            </div>
            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                <label for="city" class="col-md-3 control-label">City</label>

                <div class="col-md-7">
                    <input id="city" type="text" class="form-control" name="city" value="{{Auth::user()->city}}">

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
  								<select name="state" class="form-control">
                    <option value="{{Auth::user()->state}}">{{Auth::user()->state}}</option>
                    @foreach ($states as $s)
  									<option value={{$s}}> {{$s}}</option>
                    @endforeach
  								</select>
  									@if ($errors->has('category'))
  											<span class="help-block">
  													<strong>{{ $errors->first('state') }}</strong>
  											</span>
  									@endif
  							</div>
  					</div>
            <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                <label for="zipcode" class="col-md-3 control-label">Zipcode</label>

                <div class="col-md-7">
                    <input id="zipcode" type="text" class="form-control" name="zipcode" value="{{Auth::user()->zipcode}}">

                    @if ($errors->has('zipcode'))
                        <span class="help-block">
                            <strong>{{ $errors->first('zipcode') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            @endif
            <div class="form-group">
              <label class="col-lg-12" >
                <input value="{{Auth::user()->newsletter}}" type="checkbox" name="newsletter"> Would you like to receive our weekly newsletter?
              </label>
          </div>
    				<div class="form-group">
    						<div class="col-sm-offset text-center">
    								<button type="submit" class="btn btn-white-fill">
    										<i class="fa fa-btn fa-user"></i> Submit Edits
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
