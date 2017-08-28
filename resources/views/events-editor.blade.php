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
																			<select id="category" type="text" class="form-control" name="category" value="{{$event->category}}" >
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
																	<label for="eventLocation" class="col-md-3 control-label">Event Location Name</label>
																	<div class="col-md-7">
																			<input id="eventLocation" type="text" class="form-control" name="eventLocation" value="{{ $event->eventLocation}}">
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
																			<input id="room" type="text" class="form-control" name="room" value="{{ $event->room }}">
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
																				Browse <input type="file" onchange="readURL(this);" style="display: none;" name='event_image' required=true>
																		</label>
																	</br>
																</br>
																		<img id="event_image" src=".../img/event_small/Farmers Market_2017-08-23_18563.jpg" alt="Icon Preview" width=500 height=165/>
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
                                  <label for="eventLevel" class="col-md-3 control-label">Current Event Level</label>
                                  <div class="col-md-7">
																		<input id="evenLevel" type="text" class="form-control" name="eventLevel" value="{{ $event->eventLevel }}" disabled="true">
                                  </div>
															<div class="form-group{{ $errors->has('eventLevel') ? ' has-error' : '' }}">
																	<label class="col-md-3 control-label">Interested in an Upgrade?</label>
																	<div class="col-md-7">
                                  @if ($event->eventLevel == "Free")
																			<input id="upgradeLevel" type="radio" name="upgradeLevel" value="Silver" > Yes
																			<br>
                                  @endif
															</div>
															<div class="form-group">
									    						<div class="col-md-6 text-center">
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
