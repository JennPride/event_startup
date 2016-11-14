@extends('layouts.app')

@section('content')
<header id="intro">
  <div class="container">
    <div class="table">
      <div class="header-text">
        <div class="row">
          <div class="col-md-12 text-center">
            <h3 class="light white">Questions? Comments? Concerns?</h3>
            <h1 class="white typed">Contact Event Commons</h1>
            <span class="typed-cursor">|</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<section>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="team text-center">
            <div class="overlay text-center">
              <h2>Get in Touch</h2>
            </div>
          <form class="form-horizontal" role="form" method="POST" action="{{ url('contact') }}" id="eventstartup-form" style="color: black;">
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
              <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                  <label for="reason" class="col-md-3 control-label">Reason for Message</label>
                  <div class="col-md-7">
                    <select name="reason" class="form-control">
                      <option value="General Inquiry"> General Inquiry </option>
                      <option value="Partnership Inquiry"> Partnership Inquiry </option>
                      <option value="Suggestions"> Suggestions </option>
                      <option value="Payment Concern"> Payment Concern </option>
                      <option value="Account Concern"> Account Concern </option>
                      <option value="Other"> Other </option>
                    </select>
                      @if ($errors->has('reason'))
                          <span class="help-block">
                              <strong>{{ $errors->first('reason') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div>
                  <label for="message" class="col-md-3 control-label">Message</label>

                  <div class="col-md-8">
                      <textarea id="message" type="text" class="form-control" name="message"></textarea>

                  </div>
              </div>
              <p style="font-size: 1.25em;
                font-weight: lighter; color:white;"> We'll notify you when we've added your school - we promise no spam! </p>

              <div class="form-group">
                  <div class="col-sm-offset text-center">
                      <button type="submit" class="btn btn-blue-fill">
                          Send
                      </button>
                  </div>
              </div>
            </form>
        </div>
      </div>
    </div>
</section>


@endsection
