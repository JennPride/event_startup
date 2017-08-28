@extends('layouts.forms')

@section('content')
<a href="home"> <button class="btn btn-white-fill" style="margin: 2%;"> Back </button></a>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="team text-center" style="border-color: white;">
        <div class="cover" style="background-color: rgba(255, 255, 255, .9);">
          <div class="overlay text-center">
            <h2>Submit an Event</h2>
          </div>
        </div>
          <form class="form-horizontal" role="form" method="POST" action='/submit-event' id="eventstartup-form" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input name="school_id" type="hidden" value="{{ Auth::user()->school_id }}">
							<input name="organization" type="hidden" value="{{ Auth::user()->name}}">
							<input name="user_id" type="hidden" value="{{ Auth::user()->id}}">
              <div class="form-group{{ $errors->has('eventName') ? ' has-error' : '' }}">
                  <label for="eventName" class="col-md-3 control-label">Event Name</label>
                  <div class="col-md-7">
                      <input id="eventName" type="text" class="form-control" name="eventName" value="{{ old('eventName') }}" required=true >
                      @if ($errors->has('eventName'))
                          <span class="help-block">
                              <strong>{{ $errors->first('eventName') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
							<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
									<label for="category" class="col-md-3 control-label">Event Category</label>
									<div class="col-md-7">
											<select id="category" type="text" class="form-control" name="category" required=true>
												<option value="Athletic">Athletic</option>
												<option value="Music">Music</option>
												<option value="Performance">Performance</option>
												<option value="Exhibit">Exhibit</option>
												<option value="Education">Education</option>
												<option value="Food">Food</option>
												<option value="Recreation">Recreation</option>
												<option value="Career">Career</option>
											</select>
									</div>
							</div>
              <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                  <label for="description" class="col-md-3 control-label">Event Description</label>
                  <div class="col-md-7">
                      <textarea id="description" class="form-control" name="description" value="{{ old('description') }}" required=true></textarea>
                      @if ($errors->has('description'))
                          <span class="help-block">
                              <strong>{{ $errors->first('description') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
							<div class="form-group{{ $errors->has('eventLocation') ? ' has-error' : '' }}">
									<label for="eventLocation" class="col-md-3 control-label">Event Location Name</label>
									<div class="col-md-7">
											<input id="eventLocation" type="text" class="form-control" name="eventLocation" value="{{ old('eventLocation') }}" required=true>
											@if ($errors->has('eventLocation'))
													<span class="help-block">
															<strong>{{ $errors->first('eventLocation') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">
									<label for="room" class="col-md-3 control-label">Event Room (if applicable)</label>
									<div class="col-md-7">
											<input id="room" type="text" class="form-control" name="room" value="{{ old('room') }}">
											@if ($errors->has('room'))
													<span class="help-block">
															<strong>{{ $errors->first('room') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
									<label for="address" class="col-md-3 control-label">Location Address</label>

									<div class="col-md-7">
											<input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}"required=true>
											@if ($errors->has('address'))
													<span class="help-block">
															<strong>{{ $errors->first('address') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group{{ $errors->has('eventDate') ? ' has-error' : '' }}">
									<label for="eventDate" class="col-md-3 control-label">Event Date</label>
									<div class="col-md-7">
											<input id="eventDate" type="date" class="form-control" name="eventDate" value="{{ old('eventDate') }}"required=true>
											@if ($errors->has('eventDate'))
													<span class="help-block">
															<strong>{{ $errors->first('eventDate') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group{{ $errors->has('eventStartTime') ? ' has-error' : '' }}">
									<label for="eventStartTime" class="col-md-3 control-label">Event Start Time</label>
									<div class="col-md-7">
											<input id="eventStartTime" type="time" class="form-control" name="eventStartTime" value="{{ old('eventStartTime') }}">
											@if ($errors->has('eventStartTime'))
													<span class="help-block">
															<strong>{{ $errors->first('eventStartTime') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group{{ $errors->has('eventEndTime') ? ' has-error' : '' }}">
									<label for="eventEndTime" class="col-md-3 control-label">Event End Time</label>
									<div class="col-md-7">
											<input id="eventEndTime" type="time" class="form-control" name="eventEndTime" value="{{ old('eventEndTime') }}">
											@if ($errors->has('eventEndTime'))
													<span class="help-block">
															<strong>{{ $errors->first('eventEndTime') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group{{ $errors->has('eventSmallImage') ? ' has-error' : '' }}">

								<label for="eventSmallImage" class="col-md-3 control-label">Event Banner </label>
									<div class="col-md-7">
										<label class="btn btn-default btn-white-fill">
												Browse <input type="file" onchange="readURL(this);" style="display: none;" name='eventSmallImage' required=true>
										</label>
									</br>
								</br>
										<img id="eventSmallImage" src="#" alt="Icon Preview"  />
											@if ($errors->has('eventSmallImage'))
													<span class="help-block">
															<strong>{{ $errors->first('eventSmallImage') }}</strong>
													</span>
											@endif
										</div>
									</div>
							<div class="form-group{{ $errors->has('eventLink') ? ' has-error' : '' }}">
									<label for="eventLink" class="col-md-3 control-label">Event Link </label>
									<div class="col-md-7">
											<input id="eventLink" type="link" class="form-control" name="eventLink" value="{{ old('eventLink') }}">
											@if ($errors->has('eventLink'))
													<span class="help-block">
															<strong>{{ $errors->first('eventLink') }}</strong>
													</span>
											@endif
									</div>
							</div>
							<div class="form-group{{ $errors->has('eventLevel') ? ' has-error' : '' }}">
									<label class="col-md-3 control-label">Select Your Event Level Preference</label>
									<div class="col-md-7">
											<label><input id="eventLevel" type="radio"  name="eventLevel" value="Free"> Free Tier </label>
											includes a listing of all event information on the main events page for your school. Others can find your
                      event by searching through the main events page, and your event will show up on the front page up to 10
                      days before the start date.
											<br>
											<br>
											<label>	<input id="eventLevel" type="radio" name="eventLevel" value="Silver" > Silver Tier ($10)</label>
											includes everything from Silver Tier in addition to 20 additional days on the front page for your School, an entire
                      month on our Featured Events list, and marketing on Event Eye's social media accounts!"
											<br>
											<br>
											<br>
									</div>
              <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                      <button type="submit" class="btn btn-white-fill">
                          Submit
                      </button>
                  </div>
              </div>
          </form>
          </div>
        </div>
      </div>
  </div>
</div>

	<script>
	function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            reader.onload = function (e) {
	                $('#eventSmallImage')
	                    .attr('src', e.target.result)
	                    .width(500)
	                    .height(165);
	            };
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	</script>

@stop
