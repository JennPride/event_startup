<?php

namespace App\Http\Controllers;

use App\Event;
use App\School;
use App\User;
use App\Payment;
use App\Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

  protected function validator(array $data)
  {
      return Validator::make($data, [
          'user_id' => 'required',
          'school_id' => 'required',
      ]);
  }

  public function showForm() {
    return view('event-form');
  }

  public function submitOrCharge(Request $data) {

        $event = new Event;
        $event_small= $data->file('eventSmallImage');
        $extension = $event_small->getClientOriginalExtension();
        $eventName = $data->eventName;
        $eventDate = $data->eventDate;
        $fileName = $eventName.'_'.$eventDate.'_'.rand(11111, 99999).'.'.$extension;
        $destinationPath = 'img/event_small';
        $upload_success = $event_small->move($destinationPath, $fileName);
        if($upload_success) {
          $event->eventSmallImage = $fileName;
        } else {
          return 'Something went wrong...';
        }

        $address = str_replace(" ", "+", $data->address);
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";


        $response = file_get_contents($url);

        $json = json_decode($response,TRUE); //generate array object from the response from the web

        $event->locationLat = $json['results'][0]['geometry']['location']['lat'];
        $event->locationLng = $json['results'][0]['geometry']['location']['lng'];

        $event->eventName = $data->eventName;
        $event->eventLocation = $data->eventLocation;
        $event->school_id = $data->school_id;
        $event->organization = $data->organization;
        $event->description = $data->description;
        $event->eventDate= $data->eventDate;
        $event->eventStartTime = $data->eventStartTime;
        $event->eventEndTime = $data->eventEndTime;
        $event->category = $data->category;
        $event->address = $data->address;
        $event->eventLevel = $data->eventLevel;
        $event->eventLink = $data->eventLink;
        $event->user_id = $data->user_id;
        $event->save();

        $message = "You can view and edit your event through the event manager linked to your profile";

        $eventLevel = $data->eventLevel;

      if ($event->eventLevel != 'Free') {
          return view('paid-events.payment-form')->with('event', $event);
      } else {
        return view('success')->with('event', $event)->with('message', $message);
      }
    }

    public function manage()
    {
      $user = User::where('id', Auth::id())->first();
      $school = School::where('id', $user->school_id)->first();
      $futureEvents = Event::where('events.user_id', $user->id)->future()->orderBy('events.eventDate', 'desc')->get();
      $pastEvents = Event::where('events.user_id', $user->id)->past()->orderBy('events.eventDate', 'desc')->get();

      return view('manage-events', compact('school', 'futureEvents', 'pastEvents'));
    }

    public function __construct()
    {
      \Stripe\Stripe::setApiKey("sk_test_WyFuoU7aMTQ09Dll95hOW9IP");
    }

    public function submitPayment(Request $request) {

      $event = Event::where('id', $request->event_id);
      $event->update(['pageColor'=> $request->pageColor, 'eventLargeImage' => $request->file('eventLargeImage'),
      'longDescription' => $request->longDescription, 'orgDescription'=> $request->orgDescription, 'orgLink'=> $request->orgLink,
       'twitterLink' => $request->twitterLink, 'facebookLink' => $request->facebookLink, 'instagramLink'=> $request->instagramLink]);
      $payment = new Payment;
      $payment->user_id = $request->user_id;
      $payment->event_id = $request->event_id;
      $payment->eventLevel = $request->payment_tier;

      // Get the credit card details submitted by the form
      $token = $request['stripeToken'];
      $tier = $request['payment_tier'];

      $customer = \Stripe\Customer::create(array(
        "source" => $token,
        "description" => "Testing Stripe Charges"
      ));

      $price;

      if ($tier == 'Silver') {
        $price = 1000;
      } elseif ($tier == 'Gold') {
        $price = 2000;
      } elseif ($tier == 'Diamond') {
        $price = 3000;
      }
      // Charge the Customer instead of the card
      // Create the charge on Stripe's servers - this will charge the user's card
      try {
        $charge = \Stripe\Charge::create(array(
          "amount" => $price, // amount in cents, again
          "currency" => "usd",
          "customer" => $customer->id)
        );

      $payment->status = 'Success';
      $payment->customer_id = $customer->id;

      } catch(\Stripe\Error\Card $e) {
          $body = $e->getJsonBody();
          $err  = $body['error'];
          $payment->status = $err['code'];
          return view('error')->with('error', $error);
      }
    $payment->save();

    $user = User::find(Auth::id())->first();
    $school = School::where('id', $user->school_id)->first();

    return view('success');

  }

  public function viewEditor(Event $event)
  {
    $payment = Payment::where('event_id', $event->id)->orderBy('created_at', 'desc')->first();
    return view('events-editor', compact('event', 'payment'));

  }

  public function editEvent(Request $request, Event $event)
  {
    $event->update($request->all());

     if (empty($event->upgradeLevel)) {
       return view('success')->with('event', $event);
     } else {
        return view('paid-events.upgrade-form')->with('event', $event);
  }
}

  public function showEventPage(Event $event)
  {
    $user = User::where('id', Auth::id())->first();
    $org = User::where('id', $event->user_id)->first();
    $school = School::where('id', $user->school_id)->first();

    return view('event-page')->with('event', $event)->with('org', $org);
  }



}
