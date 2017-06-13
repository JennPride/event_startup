@extends('layouts.forms')

<!-- Stripe -->
<script src="https://js.stripe.com/v2/"></script>

<script type="text/javascript" src="js/stripe.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

@section('content')
<a href="{{ URL::previous() }}"> <button class="btn btn-white-fill" style="margin: 2%;"> Back </button> </a>

		<div class="container">
		  <div class="row">
		    <div class="col-md-12">
		      <div class="team text-center">
		        <div class="cover" style="background-color: rgba(255, 255, 255, .9);">
		          <div class="overlay text-center">
		            <h2>Event Details</h2>
		          </div>
		        </div>
						<form class="form-horizontal" role="form" method="POST" action="submit-payment" id="eventstartup-form">
															<label class="payment-description">  Thanks for choosing the {{ $event->eventLevel }} Level! Below you can customize the attributes for your
																own personal event page. If you change your mind on anything - dont worry! You can
																change all of the attributes through your event editor at any point. In addition to the
																attributes listed below, guests will also be able to like, comment, and commit to attending
																your event! </label>
																<br>
																<br>
															<input name="school_id" type="hidden" value="{{ Auth::user()->school_id }}">
															<input name="organization" type="hidden" value="{{ Auth::user()->name}}">
                              <input name="payment_tier" type="hidden" value="{{ $event->eventLevel }}">
                              <input name="user_id" type="hidden" value="{{ Auth::user()->id}}">
                              <input name="event_id" type="hidden" value="{{ $event->id }}"
                              <span class="payment-errors"></span>
															<div class="form-group{{ $errors->has('pageColor') ? ' has-error' : '' }}">
																	<label for="eventLargeImage" class="col-md-4 control-label">Select your page color</label>
																	<div class="col-md-6">
																			<input type="color" class="form-control" name="pageColor" value="{{ old('pageColor') }}" style="height: 4em;">
																			@if ($errors->has('pageColor'))
																					<span class="help-block">
																							<strong>{{ $errors->first('pageColor') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
															<div class="form-group{{ $errors->has('eventLargeImage') ? ' has-error' : '' }}">

																<label for="eventLargeImage" class="col-md-3 control-label">Event Image</label>
																	<div class="col-md-7">
																		<label class="btn btn-default btn-white-fill">
																				Browse <input type="file" onchange="readURL(this);" style="display: none;" name='eventLargeImage'>
																		</label>
																	</br>
																</br>
																		<img id="eventLargeImage" src="#" alt="Event Image"  />

																			@if ($errors->has('eventLargeImage'))
																					<span class="help-block">
																							<strong>{{ $errors->first('eventLargeImage') }}</strong>
																					</span>
																			@endif
																			<p style="color: white;"> This image will be resized to fit comfortably in line with your event description </p>
																		</div>
																	</div>
															<div class="form-group{{ $errors->has('longDescription') ? ' has-error' : '' }}">
																	<label for="longDescription" class="col-md-4 control-label">Describe your event in up to 500 words</label>
																	<div class="col-md-6">
																			<textarea class="form-control" name="longDescription" value="{{ old('longDescription') }}"></textarea>
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
																			<textarea id="orgDescription" class="form-control" name="orgDescription" value="{{ old('orgDescription') }}"></textarea>
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
																			<input id="orgLink" type="link" class="form-control" name="orgLink" value="{{ old('orgLink') }}">
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
																			<input id="twitterLink" type="link" class="form-control" name="twitterLink" value="{{ old('twitterLink') }}">
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
																			<input id="facebookLink" type="link" class="form-control" name="facebookLink" value="{{ old('facebookLink') }}">
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
																			<input id="instagramLink" type="link" class="form-control" name="instagramLink" value="{{ old('instagramLink') }}">
																			@if ($errors->has('instagramLink'))
																					<span class="help-block">
																							<strong>{{ $errors->first('instagramLink') }}</strong>
																					</span>
																			@endif
																	</div>
															</div>
														</div>
													</div>
												</div>
											<div class="col-md-12">
									      <div class="team text-center">
									        <div class="cover" style="background-color: rgba(255, 255, 255, .9);">
									          <div class="overlay text-center">
									            <h2>Payment</h2>
									          </div>
									        </div>
													<div id="eventstartup-form">
                                <div class="form-row">
                                  <label>
                                    <span>Card Number</span>
                                    <input type="text" size="20" data-stripe="number">
                                  </label>
                                </div>
                                <div class="form-row">
                                  <label>
                                    <span>Expiration (MM/YY)</span>
                                    <input type="text" size="2" data-stripe="exp_month">

                                  <span> / </span>
                                  <input type="text" size="2" data-stripe="exp_year">
																	</label>
                                </div>

                                <div class="form-row">
                                  <label>
                                    <span>CVC</span>
                                    <input type="text" size="4" data-stripe="cvc">
                                  </label>
                                </div>
																<div>
	                                 @if (($event->eventLevel == 'Gold') || ($event->eventLevel == 'Diamond'))
	                                   <label>
	                                     Once your payment is processed, you will be able to add merchandise and tickets through your
	                                     event manager! Just click your name in the top right corner and press "Manage Events"
	                                   </label>
	                                  @endif
	                              </div>
															</br>
			                        <div class="form-group">
			                            <div class="col-md-6 col-md-offset-3">
			                                <button type="submit" class="btn btn-white-fill" id="submit-payment">
																				Submit
			                                </button>
			                            </div>
			                        </div>
														</div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
	      </form>
@stop

<script>
$(document).ready(function() {
    Stripe.setPublishableKey('pk_test_OEgWzqXCsEAK9EqXD3Ixtv20');

				var $form = $('#eventstartup-form');
			  $form.submit(function(event) {
			    // Disable the submit button to prevent repeated clicks:
			    $form.find('.submit').prop('disabled', true);

			    // Request a token from Stripe:
			    Stripe.card.createToken($form, stripeResponseHandler);

			    // Prevent the form from being submitted:
			    return false;
			  });
			});

		function stripeResponseHandler(status, response) {
		  // Grab the form:
		  var $form = $('#eventstartup-form');

		  if (response.error) { // Problem!

		    // Show the errors on the form:
		    $form.find('.payment-errors').text(response.error.message);
		    $form.find('.submit').prop('disabled', false); // Re-enable submission

		  } else { // Token was created!

		    // Get the token ID:
		    var token = response.id;

		    // Insert the token ID into the form so it gets submitted to the server:
		    $form.append($('<input type="hidden" name="stripeToken">').val(token));

		    // Submit the form:
		    $form.get(0).submit();
		  }
		};
</script>

<script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#eventLargeImage')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
