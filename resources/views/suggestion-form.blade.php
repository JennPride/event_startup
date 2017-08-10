@extends('layouts.forms')

@section('content')
<a href="schools"> <button class="btn btn-white-fill" style="margin: 2%;"> Back </button> </a>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="team text-center">
        <div class="cover" style="background-color: rgba(255, 255, 255, .9);">
          <div class="overlay text-center">
            <h2>Suggest a School</h2>
          </div>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('suggest') }}" id="eventstartup-form">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-3 control-label">Your E-Mail</label>
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
                <label for="school" class="col-md-3 control-label">School</label>
                <div class="col-md-8">
                    <input id="school-suggestion" type="text" class="form-control" name="school">
                </div>
            </div>
            <p style="font-size: 1.25em;
              font-weight: lighter; color:white;"> We'll notify you when we've added your school - we promise no spam! </p>
            <div class="form-group">
                <div class="col-sm-offset text-center">
                    <button type="submit" class="btn btn-white-fill">
                        Send
                    </button>
                </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

@stop
