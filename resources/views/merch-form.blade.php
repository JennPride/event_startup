@extends('layouts.forms')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="team text-center" style="border-color: white;">
        <div class="cover" style="background-color: rgba(255, 255, 255, .9);">
          <div class="overlay text-center">
            <h2>Add Merchandise</h2>
          </div>
        </div>
      <form class="form-horizontal" role="form" method="POST" action='/submit-merch' id="eventstartup-form" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input name="event_id" type="hidden" value="{{$event->id}}">
					<input name="school_id" type="hidden" value="{{ Auth::user()->school_id }}">
					<input name="organization" type="hidden" value="{{ Auth::user()->name}}">
					<input name="user_id" type="hidden" value="{{ Auth::user()->id}}">
          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              <label for="title" class="col-md-3 control-label">Merchandise Name</label>
              <div class="col-md-7">
                  <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                  @if ($errors->has('title'))
                      <span class="help-block">
                          <strong>{{ $errors->first('title') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
					<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
							<label for="category" class="col-md-3 control-label">Merchandise Category</label>
							<div class="col-md-7">
									<select id="category" type="text" class="form-control" name="category">
										<option value="Apparel">Apparel</option>
										<option value="Accessories">Accessories</option>
										<option value="Device Cases">Device Cases</option>
										<option value="Decor">Decor</option>
										<option value="Stationary and Stickers">Stationary and Stickers</option>
										<option value="Bags">Bags</option>
										<option value="Posters and Prints">Posters and Prints</option>
										<option value="Drinkware">Drinkware</option>
                    <option value="Other">Career</option>
									</select>
							</div>
					</div>
          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
              <label for="description" class="col-md-3 control-label">Merchandise Description</label>

              <div class="col-md-7">
                  <textarea id="description" class="form-control" name="description" value="{{ old('description') }}"></textarea>

                  @if ($errors->has('description'))
                      <span class="help-block">
                          <strong>{{ $errors->first('description') }}</strong>
                      </span>
                  @endif
              </div>
              <p> Please mention any important notes such as sizing measurements, availability, etc. </p>
          </div>
					<div class="form-group{{ $errors->has('eventLocation') ? ' has-error' : '' }}">
							<label for="eventLocation" class="col-md-3 control-label">Event Location Name</label>

							<div class="col-md-7">
									<input id="eventLocation" type="text" class="form-control" name="eventLocation" value="{{ old('eventLocation') }}">
									@if ($errors->has('eventLocation'))
											<span class="help-block">
													<strong>{{ $errors->first('eventLocation') }}</strong>
											</span>
									@endif
							</div>
					</div>
					<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
							<label for="price" class="col-md-3 control-label">Merchandise Price</label>
							<div class="col-md-7">
									<input id="price"  type="number" min="1" step="any" class="form-control" name="price" value="{{ old('price') }}">
									@if ($errors->has('price'))
											<span class="help-block">
													<strong>{{ $errors->first('price') }}</strong>
											</span>
									@endif
							</div>
					</div>
          <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
              <label for="quantity" class="col-md-3 control-label">Quantity Available</label>
              <div class="col-md-7">
                  <input id="quantity" type="number" class="form-control" name="quantity" value="{{ old('quantity') }}">
                  @if ($errors->has('quantity'))
                      <span class="help-block">
                          <strong>{{ $errors->first('quantity') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <div class="form-group{{ $errors->has('delivery_method') ? ' has-error' : '' }}">
              <label for="delivery_method" class="col-md-3 control-label">Delivery Method</label>
              <div class="col-md-7">
                  <select id="delivery_method" type="text" class="form-control" name="delivery_method">
                    <option value="Pick-Up">Pick-Up</option>
                    <option value="Delivery">Delivery</option>
                  </select>
                  <p> Please note that this is an ordering system only and we do not handle any procurement processes, including delivery or manning pickup tables </p>
              </div>
          </div>
					<div class="form-group{{ $errors->has('delivery details') ? ' has-error' : '' }}">
							<label for="delivery details" class="col-md-3 control-label">Location delivery details</label>

							<div class="col-md-7">
									<textarea id="delivery details" class="form-control" name="delivery details" value="{{ old('delivery details') }}"></textarea>
									@if ($errors->has('delivery details'))
											<span class="help-block">
													<strong>{{ $errors->first('delivery details') }}</strong>
											</span>
									@endif
							</div>
					</div>
					<div class="form-group{{ $errors->has('merch_image') ? ' has-error' : '' }}">
						<label for="merch_image" class="col-md-3 control-label">Merchandise Image</label>
							<div class="col-md-7">
								<label class="btn btn-default btn-white-fill">
										Browse <input type="file" onchange="readURL(this);" style="display: none;" name='merch_image'>
								</label>
							</br>
						</br>
								<img id="merch_image" src="#" alt="Banner Preview"  />

									@if ($errors->has('merch_image'))
											<span class="help-block">
													<strong>{{ $errors->first('merch_image') }}</strong>
											</span>
									@endif
								</div>
							</div>

					<div class="form-group{{ $errors->has('eventLevel') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">Select Your Pricing Preference</label>
							<div class="col-md-7">
                <p> Because of the online payment system we use (Stripe), we must charge a 6-8% fee all merchandise. About 3% of that fee is directly paid to stripe, 3% is paid to use for processing, and the remaining 2% can be dedicated to our scholarship fund. We know that selling merchandise online is frustrating and we try our best to be as open as possible about these fees, which is why we give you the below options </p>
									<label><input id="eventLevel" type="radio"  name="eventLevel" value="Free"> Default </label> add the 8% to the price of the merchandise - the purchaser pays the fee. 
									<br>
									<br>
									<label>	<input id="eventLevel" type="radio" name="eventLevel" value="Silver" > Silver Tier ($10)</label>
									includes everything from the Free Tier in addition to your own events page on our website, which you can customize
									how you like!
									<br>
									<br>
									<label>	<input id="eventLevel" type="radio" name="eventLevel" value="Gold"> Gold Tier ($20) </label>
									includes everything from the Silver Tier in addition to the ability to sell tickets and merchandise through our site!
									<br>
									<br>
									<label>	<input id="eventLevel" type="radio" name="eventLevel" value="Diamond"> Diamond Tier ($25) </label>
									includes everything from the Gold Tier in addition to marketing through our website and our social media channels.
									Chalking is a thing of the past - reach out to your school faster and more efficiently through our site and accounts!
									<br>
							</div>
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

	<script>
	function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();

	            reader.onload = function (e) {
	                $('#merch_image')
	                    .attr('src', e.target.result)
	                    .width(250)
	                    .height(250);
	            };

	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	</script>

@stop
