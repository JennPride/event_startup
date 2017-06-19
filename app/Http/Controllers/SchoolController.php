<?php

namespace App\Http\Controllers;

use App\School;
use App\User;
use App\Event;
use App\Suggestion;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    public function showAll()
    {
        $schools = School::all();
        return view('schools', compact('schools'));
    }

    public function showSchool(School $school) {
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
    $school = School::where('id', $school->id)->first();
    $events = Event::where('events.school_id', $school->id)->leftJoin('payments', 'events.id', '=', 'event_id')->where('events.eventLevel', '=', 'Free')->orWhere('payments.status', '=', 'Success')->future()->get(['events.id', 'events.eventLevel', 'events.eventName', 'events.eventLocation', 'events.school_id', 'events.organization', 'events.description', 'events.eventDate', 'events.eventStartTime', 'events.eventEndTime', 'events.eventSmallImage', 'events.category', 'events.locationLat', 'events.locationLng', 'events.address', 'events.eventLevel', 'events.eventLink', 'events.user_id']);
    return view('school', compact('school', 'events', 'categories'));
    }

    public function suggest(Request $request) {

      $sugg = new Suggestion;

      $sugg->email = $request->email;
      $sugg->school = $request->school;
      $sugg->save();

      return view('success');
    }
}
