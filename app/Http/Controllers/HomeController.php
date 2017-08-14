<?php

namespace App\Http\Controllers;

use App\School;
use App\User;
use App\Event;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $categories = [
        'Athletic',
        'Music',
        'Performance',
        'Exhibit',
        'Education',
        'Food',
        'Recreation',
        'Career'
      ];

      //Consider removing featured OR having all non featured events free to simplify logic?

        $currUser = User::where('id', Auth::id())->first();
        $school = School::where('id', $currUser->school_id)->first();

        // Grab all events that are from the user's school, free or paid for, and are in the future
        $events = Event::where('events.school_id', $currUser->school_id)->
        leftJoin('payments', 'events.id', '=', 'event_id')->where('events.eventLevel', '=', 'Free')
        ->orWhere('payments.status', '=', 'Success')->future()->get(['events.id', 'events.eventLevel',
         'events.eventName', 'events.eventLocation', 'events.school_id', 'events.organization',
          'events.description', 'events.eventDate', 'events.eventStartTime', 'events.eventEndTime',
          'events.eventSmallImage', 'events.category', 'events.locationLat', 'events.locationLng',
          'events.address', 'events.eventLevel', 'events.eventLink', 'events.user_id']);

        // Grab all featured events which are paid for
        $featured = Event::where('events.school_id', $school->id)->leftJoin('payments', 'events.id', '=', 'event_id')->where('events.eventLevel', '=', 'Free')->orWhere('payments.status', '=', 'Success')->future()->feature()->get(['events.id', 'events.eventLevel', 'events.eventName', 'events.eventLocation', 'events.school_id', 'events.organization', 'events.description', 'events.eventDate', 'events.eventStartTime', 'events.eventEndTime', 'events.eventSmallImage', 'events.category', 'events.locationLat', 'events.locationLng', 'events.address', 'events.eventLevel', 'events.eventLink', 'events.user_id']);
        return view('home', compact('school', 'events', 'featured', 'categories'));
    }

    public function search(Request $request)
    {
      $currUser = User::where('id', Auth::id())->first();
      $school = School::where('id', $currUser->school_id)->first();
      $featured = null;

      $category = $request->category;

      $startDate = $request->startDate;
      if ($startDate == "") {
        $startDate = date('Y-m-d');
      }


      $endDate = $request->endDate;
      if ($endDate == "") {
        $endDate = '9999-01-01';
      }

      $startTime = $request->startTime;
      if ($startTime == "") {
        $startTime = '24:00:00';
      }

      $categories = [
        'Athletic',
        'Music',
        'Performance',
        'Exhibit',
        'Education',
        'Food',
        'Recreation',
        'Career'
      ];

      if ($category == 'All' ) {
        $events = Event::where('events.school_id', $currUser->school_id)
        ->leftJoin('payments', 'events.id', '=', 'event_id')->where('events.eventLevel', '=', 'Free')
        ->orWhere('payments.status', '=', 'Success')
        ->where('events.eventDate', '>=', $startDate)
        ->where('events.eventDate', '<=', $endDate)->where('events.eventStartTime', '<', $startTime)
        ->orderBy('events.eventDate', 'desc')
        ->get(['events.id', 'events.eventLevel', 'events.eventName', 'events.eventLocation', 'events.school_id',
        'events.organization', 'events.description', 'events.eventDate', 'events.eventStartTime', 'events.eventEndTime',
        'events.eventSmallImage', 'events.category', 'events.locationLat', 'events.locationLng', 'events.address', 'events.eventLevel',
        'events.eventLink', 'events.user_id']);
      } else {
        $events = Event::where('events.school_id', $currUser->school_id)->leftJoin('payments', 'events.id', '=', 'event_id')
        ->where('events.eventLevel', '=', 'Free')->orWhere('payments.status', '=', 'Success')->where('events.eventDate', '>=', $startDate)->where('events.eventDate', '<=', $endDate)
        ->where('events.category', $category)->where('events.eventStartTime', '<', $startTime)->leftJoin('users', 'events.user_id', '=', 'users.id')->orderBy('events.eventDate', 'desc')
        ->get(['events.id', 'events.eventLevel', 'events.eventName', 'events.eventLocation', 'events.school_id', 'events.organization', 'events.description', 'events.eventDate', 'events.eventStartTime',
        'events.eventEndTime', 'events.eventSmallImage', 'events.category', 'events.locationLat', 'events.locationLng', 'events.address', 'events.eventLevel', 'events.eventLink', 'events.user_id']);
      }

      return view('home', compact('school', 'events', 'featured', 'categories'));
    }
}
