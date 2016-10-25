@extends('layouts.forms')

@section('content')

<a href="/"> <button class="btn btn-white-fill" style="margin: 2%;"> Back </button> </a>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="team text-center" style="border-color: white;">
        <div class="cover" style="background-color: rgba(255, 255, 255, .9);">
          <div class="overlay text-center">
            <h2>Login</h2>
          </div>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" id="eventstartup-form">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-3 control-label">E-Mail</label>

                <div class="col-md-8">
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

                <div class="col-md-8">
                    <input id="password" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset text-center">
                    <button type="submit" class="btn btn-white-fill">
                        <i class="fa fa-btn fa-sign-in"></i> Go
                    </button>
                  <br>
                  <br>
                    <a href="{{ url('/password/reset') }}" style="color: white;">Forgot Your Password?</a>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

@stop
