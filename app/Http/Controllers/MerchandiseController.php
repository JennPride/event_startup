<?php

namespace App\Http\Controllers;

use App\Event;
use App\School;
use App\User;
use App\Payment;
use App\Image;
use App\Product;
use App\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MerchandiseController extends Controller
{

  public function viewEditor(Event $event) {

    $merch = Product::where('event_id', $event->id)->get();
    $tickets = Ticket::where('event_id', $event->id)->get();

    return view('merch-form')->with('event', $event)->with('merch', $merch)->with('tickets', $tickets);
  }

  public function viewMerchChoice(Event $event) {
    return view('merch-or-tick')->with('event', $event);
  }

}
