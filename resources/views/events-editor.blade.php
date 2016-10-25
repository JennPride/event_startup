
@extends('layouts.app')


@section('content')

<br>
<br>
		<div id="greywrap">
			<div class="container">
			    <div class="row">
			        <div class="col-md-8 col-md-offset-2">
			            <div class="panel panel-default">
			                <div class="panel-heading"> Edit Your Event</div>
			                <div class="panel-body">
			                    <form class="form-horizontal" role="form" method="POST" action="submit-event-change" enctype="multipart/form-data">
                            {{method_field('PATCH')}}
                              {{ csrf_field() }}
															<input name="school_id" type="hidden" value="{{ Auth::user()->school_id }}">
															<input name="organization" type="hidden" value="{{ Auth::user()->name}}">
                              <input name="id" type="hidden" value="{{ $event->id }}">
															  <input name="user_id" type="hidden" value="{{ Auth::user()->id}}">
			                        <div class="form-group{{ $errors->has('eventName') ? ' has-error' : '' }}">
			                            <label for="eventName" class="col-md-4 control-label">Event Name</label>

			                            <div class="col-md-6">
			                                <input id="eventName" type="text" class="form-control" name="eventName" value="{{ $event->eventName }}">

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
																			<select id="category" type="text" class="form-control" name="category" value="{{ $event->category }}">
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
			                                <textarea id="description" class="form-control" name="description" value="{{ $event->description }}"></textarea>

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
																			<input id="eventLocation" type="text" class="form-control" name="eventLocation" value="{{ $event->eventLocation}}">
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
																			<input id="room" type="text" class="form-control" name="room" value="{{ $event->room }}">
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
																			<input id="address" type="text" class="form-control" name="address" value="{{ $event->address }}">
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
																			<input id="eventDate" type="date" class="form-control" name="eventDate" value="{{ $event->eventDate }}">
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
																			<input id="eventStartTime" type="time" class="form-control" name="eventStartTime" value="{{ $event->eventStartTime }}">
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
																			<input id="eventEndTime" type="time" class="form-control" name="eventEndTime" value="{{ $event->eventEndTime}}">
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
																			<input id="eventSmallImage" type="file" class="form-control" name="eventSmallImage" value="" >
																			@if ($errors->has('eventSmallImage'))
																					<span class="help-block">
																							<strong>{{ $errors->first('eventSmallImage') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('eventLink') ? ' has-error' : '' }}">
																	<label for="eventLink" class="col-md-4 control-label">Event Link </label>
																	<div class="col-md-6">
																			<input id="eventLink" type="link" class="form-control" name="eventLink" value="{{ $event->eventLink }}">
																			@if ($errors->has('eventLink'))
																					<span class="help-block">
																							<strong>{{ $errors->first('eventLink') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
                              @if ($event->eventLevel != 'Free')
															<div class="form-group{{ $errors->has('pageColor') ? ' has-error' : '' }}">
																	<label for="eventLargeImage" class="col-md-4 control-label">Select your page color</label>
																	<div class="col-md-6">
																			<input id="pageColor" type="color" class="form-control" name="pageColor" value="{{ $event->pageColor }}">
																			@if ($errors->has('pageColor'))
																					<span class="help-block">
																							<strong>{{ $errors->first('pageColor') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('eventLargeImage') ? ' has-error' : '' }}">
																	<label for="eventLargeImage" class="col-md-4 control-label">Event Picture</label>
																	<div class="col-md-6">
																			<input id="eventLarge" type="file" class="form-control" name="eventLarge" value="">
																			@if ($errors->has('eventLargeImage'))
																					<span class="help-block">
																							<strong>{{ $errors->first('eventLargeImage') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('longDescription') ? ' has-error' : '' }}">
																	<label for="longDescription" class="col-md-4 control-label">Describe your event in up to 500 words</label>
																	<div class="col-md-6">
																			<textarea id="pageColor" class="form-control" name="longDescription" value="{{ $event->longDescription }}"></textarea>
																			@if ($errors->has('longDescription'))
																					<span class="help-block">
																							<strong>{{ $errors->first('longDescription') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('orgDescription') ? ' has-error' : '' }}">
																	<label for="orgDescription" class="col-md-4 control-label">Describe your organization in up to 500 words</label>
																	<div class="col-md-6">
																			<textarea id="orgDescription" class="form-control" name="orgDescription" value="{{ $event->orgDescription }}"></textarea>
																			@if ($errors->has('orgDescription'))
																					<span class="help-block">
																							<strong>{{ $errors->first('orgDescription') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('orgLink') ? ' has-error' : '' }}">
																	<label for="orgLink" class="col-md-4 control-label">Link to your organization website (if applicable)</label>
																	<div class="col-md-6">
																			<input id="orgLink" type="link" class="form-control" name="orgLink" value="{{ $event->orgLink }}">
																			@if ($errors->has('orgLink'))
																					<span class="help-block">
																							<strong>{{ $errors->first('orgLink') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('twitterLink') ? ' has-error' : '' }}">
																	<label for="twitterLink" class="col-md-4 control-label">Link to your organization twitter (if applicable)</label>
																	<div class="col-md-6">
																			<input id="twitterLink" type="link" class="form-control" name="twitterLink" value="{{ $event->twitterLink }}">
																			@if ($errors->has('twitterLink'))
																					<span class="help-block">
																							<strong>{{ $errors->first('twitterLink') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('facebookLink') ? ' has-error' : '' }}">
																	<label for="facebookLink" class="col-md-4 control-label">Link to your organization Facebook (if applicable)</label>
																	<div class="col-md-6">
																			<input id="facebookLink" type="link" class="form-control" name="facebookLink" value="{{ $event->facebookLink }}">
																			@if ($errors->has('facebookLink'))
																					<span class="help-block">
																							<strong>{{ $errors->first('facebookLink') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('instagramLink') ? ' has-error' : '' }}">
																	<label for="instagramLink" class="col-md-4 control-label">Link to your organization Instagram (if applicable)</label>
																	<div class="col-md-6">
																			<input id="instagramLink" type="link" class="form-control" name="instagramLink" value="{{ $event->instagramLink }}">
																			@if ($errors->has('instagramLink'))
																					<span class="help-block">
																							<strong>{{ $errors->first('instagramLink') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
                                @endif
                                  <label for="instagramLink" class="col-md-4 control-label">Current Event Level</label>
                                  <div class="col-md-6">
                                      <p> {{ $event->eventLevel }}</p>
                                  </div>
                              @if ($event->eventLevel != "Diamond")
															<div class="form-group{{ $errors->has('eventLevel') ? ' has-error' : '' }}">
																	<label class="col-md-4 control-label">Interested in an Upgrade?</label>
																	<div class="col-md-6">
                                  @if ($event->eventLevel == "Free")
																			<label>	<input id="upgradeLevel" type="radio" name="upgradeLevel" value="Silver" > Silver Tier </label>
																			includes everything from the Free Tier in addition to your own events page on our website, which you can customize
																			how you like for $10
																			<br>
                                  @endif
                                  @if (($event->eventLevel == "Silver") || ($event->eventLevel == "Free"))
																			<label>	<input id="upgradeLevel" type="radio" name="upgradeLevel" value="Gold"> Gold Tier  </label>
																			includes everything from the Silver Tier in addition to the ability to sell tickets and merchandise through our site
																			for $20
																			<br>
                                  @endif
                                  @if (($event->eventLevel == "Silver") || ($event->eventLevel == "Free") || ($event->eventLevel == "Gold"))
																			<label>	<input id="upgradeLevel" type="radio" name="upgradeLevel" value="Diamond"> Diamond Tier </label>
																			includes everything from the Gold Tier in addition to marketing through our website and our social media channels.
																			Chalking is a thing of the past - reach out to your school faster and more efficiently through our site and accounts
																			for just $30!
																			<br>
                                    @endif
																	</div>
                                  @endif
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
