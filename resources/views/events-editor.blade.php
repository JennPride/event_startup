@extends('layouts.forms')

@section('content')
<a href="/manage-events"> <button class="btn btn-white-fill" style="margin: 2%;"> Back </button> </a>
			<div class="container">
			    <div class="row">
			        <div class="col-md-12">
									<div class="team text-center">
										<div class="cover" style="background-color: rgba(255, 255, 255, .9);">
											<div class="overlay text-center">
												<h2>Edit Your Event</h2>
											</div>
										</div>
			                    <form class="form-horizontal" role="form" id="eventstartup-form" method="POST" action="submit-event-change" enctype="multipart/form-data">
                            {{method_field('PATCH')}}
                              {{ csrf_field() }}
															<input name="school_id" type="hidden" value="{{ Auth::user()->school_id }}">
															<input name="organization" type="hidden" value="{{ Auth::user()->name}}">
                              <input name="id" type="hidden" value="{{ $event->id }}">
															<input name="user_id" type="hidden" value="{{ Auth::user()->id}}">
			                        <div class="form-group{{ $errors->has('eventName') ? ' has-error' : '' }}">
			                            <label for="eventName" class="col-md-3 control-label">Event Name</label>
			                            <div class="col-md-7">
			                                <input id="eventName" type="text" class="form-control" name="eventName" value="{{ $event->eventName }}">
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
																			<select id="category" type="text" class="form-control" name="category">
																				<option value="{{$event->category}}" selected="selected">{{$event->category}}</option>
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
			                                <textarea id="description" class="form-control" name="description" value="{{ $event->description }}">{{ $event->description }}</textarea>
			                                @if ($errors->has('description'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('description') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>
															<div class="form-group{{ $errors->has('eventLocation') ? ' has-error' : '' }}">
																	<label for="eventLocation" class="col-md-3 control-label">Location Name</label>
																	<div class="col-md-7">
																			<input id="eventLocation" type="text" class="form-control" name="eventLocation" value="{{ $event->eventLocation}}">
																			@if ($errors->has('eventLocation'))
																					<span class="help-block">
																							<strong>{{ $errors->first('eventLocation') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
																	<label for="address" class="col-md-3 control-label">Location Address</label>

																	<div class="col-md-7">
																			<input id="address" type="text" class="form-control" name="address" value="{{ $event->address }}">
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
																			<input id="eventDate" type="date" class="form-control" name="eventDate" value="{{ $event->eventDate }}">
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
																			<input id="eventStartTime" type="time" class="form-control" name="eventStartTime" value="{{ $event->eventStartTime }}">
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
																			<input id="eventEndTime" type="time" class="form-control" name="eventEndTime" value="{{ $event->eventEndTime}}">
																			@if ($errors->has('eventEndTime'))
																					<span class="help-block">
																							<strong>{{ $errors->first('eventEndTime') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('eventSmallImage') ? ' has-error' : '' }}">
																	<label for="eventSmallImage" class="col-md-3 control-label">Event Cover Image</label>
																	<div class="col-md-7">
																		<label class="btn btn-default btn-white-fill">
																				Browse <input type="file" onchange="readURL(this);" style="display: none;" name='event_image'>
																		</label>
																	</br>
																</br>
																		<img id="event_image" src="/img/event_small/{{$event->eventSmallImage}}" alt="Cover Photo Preview" width=500 height=165/>
																		</div>
															</div>
															<div class="form-group{{ $errors->has('eventLink') ? ' has-error' : '' }}">
																	<label for="eventLink" class="col-md-3 control-label">Event Link </label>
																	<div class="col-md-7">
																			<input id="eventLink" type="link" class="form-control" name="eventLink" value="{{ $event->eventLink }}">
																			@if ($errors->has('eventLink'))
																					<span class="help-block">
																							<strong>{{ $errors->first('eventLink') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('eventLevel') ? ' has-error' : '' }}">
                                  <label for="eventLevel" class="col-md-3 control-label">Current Event Level</label>
                                  <div class="col-md-7">
																		<input id="eventLevel" type="text" class="form-control" name="eventLevel" value="{{ $event->eventLevel }}" disabled="true">
                                  </div>
																</div>
																<br>
																@if ($event->eventLevel == "Free")
																<div class="cover" style="background-color: rgba(255, 255, 255, .9);">
																</div>
																<div class="overlay text-center">
																<h2 style="color: white;"> Upgrade {{$event->eventName}}?</h2>
																<p style="color: white;">We'll
																post your event on your School's front page for an extra 20 days, market your
																event on our social media accounts, and feature your event at the top for an entire month! All
															  for just $10.</p>
															</div>
																<div class="form-group" >
																  <div class="col-lg-7">
																		<label class="form-check-label" style="text-align: center;">
																		<input id="upgradeLevel" type="checkbox" name="upgradeLevel" value="Silver">
      															Upgrade to Silver Level for $10!
    																</label>
																  </div>
																</div>
																@endif
						    								<button type="submit" class="btn btn-white-fill">
						    										Submit Edits
						    								</button>
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
					                $('#event_image')
					                    .attr('src', e.target.result)
															.width(500)
					                    .height(165);
					            };

					            reader.readAsDataURL(input.files[0]);
					        }
					    }
					</script>
@stop
