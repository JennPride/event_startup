@extends('layouts.app')


@section('content')

<br>
<br>
		<div id="greywrap">
			<div class="container">
			    <div class="row">
			        <div class="col-md-8 col-md-offset-2">
			            <div class="panel panel-default">
			                <div class="panel-heading">Submit an Event</div>
			                <div class="panel-body">
			                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/submit-event') }}">
			                        {{ csrf_field() }}
															<input name="school_id" type="hidden" value="{{ Auth::user()->school_id }}">
															<input name="organization" type="hidden" value="{{ Auth::user()->name}}">
                                <input name="user_id" type="hidden" value="{{ Auth::user()->id}}">
			                        <div class="form-group{{ $errors->has('eventName') ? ' has-error' : '' }}">
			                            <label for="eventName" class="col-md-4 control-label">Event Name</label>

			                            <div class="col-md-6">
			                                <input id="eventName" type="text" class="form-control" name="eventName" value="{{ old('eventName') }}">

			                                @if ($errors->has('eventName'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('eventName') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>
															<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
																	<label for="category" class="col-md-4 control-label">Event Category</label>

																	<div class="col-md-6">
																			<select id="category" type="text" class="form-control" name="category">
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
			                            <label for="description" class="col-md-4 control-label">Event Description</label>

			                            <div class="col-md-6">
			                                <textarea id="description" class="form-control" name="description" value="{{ old('description') }}"></textarea>

			                                @if ($errors->has('description'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('description') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>
															<div class="form-group{{ $errors->has('eventLocation') ? ' has-error' : '' }}">
																	<label for="eventLocation" class="col-md-4 control-label">Event Location Name</label>

																	<div class="col-md-6">
																			<input id="eventLocation" type="text" class="form-control" name="eventLocation" value="{{ old('eventLocation') }}">
																			@if ($errors->has('eventLocation'))
																					<span class="help-block">
																							<strong>{{ $errors->first('eventLocation') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">
																	<label for="room" class="col-md-4 control-label">Event Room (if applicable)</label>
																	<div class="col-md-6">
																			<input id="room" type="text" class="form-control" name="room" value="{{ old('room') }}">
																			@if ($errors->has('room'))
																					<span class="help-block">
																							<strong>{{ $errors->first('room') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
																	<label for="address" class="col-md-4 control-label">Location Address</label>

																	<div class="col-md-6">
																			<input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
																			@if ($errors->has('address'))
																					<span class="help-block">
																							<strong>{{ $errors->first('address') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('eventDate') ? ' has-error' : '' }}">
																	<label for="eventDate" class="col-md-4 control-label">Event Date</label>
																	<div class="col-md-6">
																			<input id="eventDate" type="date" class="form-control" name="eventDate" value="{{ old('eventDate') }}">
																			@if ($errors->has('eventDate'))
																					<span class="help-block">
																							<strong>{{ $errors->first('eventDate') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('eventStartTime') ? ' has-error' : '' }}">
																	<label for="eventStartTime" class="col-md-4 control-label">Event Start Time</label>
																	<div class="col-md-6">
																			<input id="eventStartTime" type="time" class="form-control" name="eventStartTime" value="{{ old('eventStartTime') }}">
																			@if ($errors->has('eventStartTime'))
																					<span class="help-block">
																							<strong>{{ $errors->first('eventStartTime') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('eventEndTime') ? ' has-error' : '' }}">
																	<label for="eventEndTime" class="col-md-4 control-label">Event End Time</label>
																	<div class="col-md-6">
																			<input id="eventEndTime" type="time" class="form-control" name="eventEndTime" value="{{ old('eventEndTime') }}">
																			@if ($errors->has('eventEndTime'))
																					<span class="help-block">
																							<strong>{{ $errors->first('eventEndTime') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('eventSmallImage') ? ' has-error' : '' }}">
																	<label for="eventSmallImage" class="col-md-4 control-label">Event Thumbnail</label>
																	<div class="col-md-6">
																			<input id="eventSmallImage" type="file" class="form-control" name="eventSmallImage" value="{{ old('eventSmallImage') }}">
																			@if ($errors->has('eventSmallImage'))
																					<span class="help-block">
																							<strong>{{ $errors->first('eventSmallImage') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('eventLargeImage') ? ' has-error' : '' }}">
																	<label for="eventLargeImage" class="col-md-4 control-label">Event Image</label>
																	<div class="col-md-6">
																			<input id="eventLargeImage" type="file" class="form-control" name="eventLargeImage" value="{{ old('eventLargeImage') }}">
																			@if ($errors->has('eventLargeImage'))
																					<span class="help-block">
																							<strong>{{ $errors->first('eventLargeImage') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('eventLink') ? ' has-error' : '' }}">
																	<label for="eventLargeImage" class="col-md-4 control-label">Event Link </label>
																	<div class="col-md-6">
																			<input id="eventLink" type="link" class="form-control" name="eventLink" value="{{ old('eventLink') }}">
																			@if ($errors->has('eventLink'))
																					<span class="help-block">
																							<strong>{{ $errors->first('eventLink') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('eventLevel') ? ' has-error' : '' }}">
																	<label class="col-md-4 control-label">Select Your Event Level Preference</label>
																	<div class="col-md-6">
																			<label><input id="eventLevel" type="radio"  name="eventLevel" value="free"  checked> Free Tier </label>
																			includes a listing of all event information on the main events page for your school.
																			<br>
																			<label>	<input id="eventLevel" type="radio" name="eventLevel" value="second" > Silver Tier </label>
																			includes everything from the Free Tier in addition to your own events page on our website, which you can customize
																			how you like for $10
																			<br>
																			<label>	<input id="eventLevel" type="radio" name="eventLevel" value="third"> Gold Tier  </label>
																			includes everything from the Silver Tier in addition to the ability to sell tickets and merchandise through our site
																			for $25. No upcharging or hidden fees - simply use our platform to make the most of your event!
																			<br>
																			<label>	<input id="eventLevel" type="radio" name="eventLevel" value="fourth"> Diamond Tier </label>
																			includes everything from the Gold Tier in addition to marketing through our website and our social media channels.
																			Chalking is a thing of the past - reach out to your school faster and more efficiently through our site and accounts
																			for just $30!
																			<br>
																	</div>
															</div>
			                        <div class="form-group">
			                            <div class="col-md-6 col-md-offset-4">
			                                <button type="submit" class="btn btn-primary">
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
@stop
