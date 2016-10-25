@extends('layouts.app')

<!-- Stripe -->
<script src="https://js.stripe.com/v2/"></script>

<script type="text/javascript" src="js/stripe.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

@section('content')

<br>
<br>
		<div id="greywrap">
			<div class="container">
			    <div class="row">
			        <div class="col-md-8 col-md-offset-2">
			            <div class="panel panel-default">
			                <div class="panel-heading">Upgrade Payment</div>
                      <div class="pannel-body">
                      <p>  Thanks for choosing the {{ $event->upgradeLevel }} Level! Below you can customize the attributes for your
                        own personal event page. If you change your mind on anything - dont worry! You can
                        change all of the attributes through your event editor at any point. In addition to the
                        attributes listed below, guests will also be able to like, comment, and commit to attending
                        your event! </p>
                      </div>
			                <div class="panel-body">
			                    <form class="form-horizontal" role="form" method="POST" action="/submit-upgrade" id="payment-form">
			                        {{ csrf_field() }}
															<input name="school_id" type="hidden" value="{{ Auth::user()->school_id }}">
															<input name="organization" type="hidden" value="{{ Auth::user()->name}}">
                              <input name="user_id" type="hidden" value="{{ Auth::user()->id}}">
                              <input name="event_id" type="hidden" value="{{ $event->id }}">
                              <span class="payment-errors"></span>
                              @if ($event->upgradeLevel == 'Silver')
															<div class="form-group{{ $errors->has('pageColor') ? ' has-error' : '' }}">
																	<label for="eventLargeImage" class="col-md-4 control-label">Select your page color</label>
																	<div class="col-md-6">
																			<input id="pageColor" type="color" class="form-control" name="pageColor" value="{{ old('pageColor') }}">
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
																			<input id="eventLarge" type="file" class="form-control" name="eventLarge" value="{{ old('eventLarge') }}">
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
																			<textarea id="pageColor" class="form-control" name="longDescription" value="{{ old('longDescription') }}"></textarea>
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
                              @endif
                              <div>
                                 @if (($event-upgradeLevel == 'Gold') || ($event->upgradeLevel == 'Diamond'))
                                   <p>
                                     Once your payment is processed, you will be able to add merchandise and tickets through your
                                     event manager! Just click your name in the top right corner and press "Manage Events"
                                   </p>
                                  @endif
                              </div>
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
                                  </label>
                                  <span> / </span>
                                  <input type="text" size="2" data-stripe="exp_year">
                                </div>

                                <div class="form-row">
                                  <label>
                                    <span>CVC</span>
                                    <input type="text" size="4" data-stripe="cvc">
                                  </label>
                                </div>
			                        <div class="form-group">
			                            <div class="col-md-6 col-md-offset-4">
			                                <button type="submit" class="btn btn-primary" id="submit-payment">
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
		</div>
@stop

<script>
$(document).ready(function() {
    Stripe.setPublishableKey('pk_test_OEgWzqXCsEAK9EqXD3Ixtv20');

				var $form = $('#payment-form');
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
		  var $form = $('#payment-form');

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
