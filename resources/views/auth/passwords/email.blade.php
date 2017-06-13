@extends('layouts.forms')

<!-- Main Content -->
@section('content')
<a href="/login"> <button class="btn btn-white-fill" style="margin: 2%;"> Back </button> </a>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="team text-center" style="border-color: white;">
        <div class="cover" style="background-color: rgba(255, 255, 255, .9);">
          <div class="overlay text-center">
                <h2>Reset Password</h2>
              </div>
            </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}" id="eventstartup-form">
                        {{ csrf_field() }}

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
                        <div class="form-group">
                            <div class="col-sm-offset text-center">
                                <button type="submit" class="btn btn-white-fill"> Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
