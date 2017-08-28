<?php

namespace App\Http\Controllers;

use App\School;
use App\User;
use App\Event;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Image;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
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
        $user = User::where('id', Auth::id())->first();
        $school = School::where('id', $user->school_id)->first();

        return view('profile', compact('school'));

    }

    public function showEditor()
    {
      $states = ['ALABAMA',
        'ALASKA',
        'AMERICAN SAMOA',
        'ARIZONA',
        'ARKANSAS',
        'CALIFORNIA',
        'COLORADO',
        'CONNECTICUT',
        'DELAWARE',
        'DISTRICT OF COLUMBIA',
        'FEDERATED STATES OF MICRONESIA',
        'FLORIDA',
        'GEORGIA',
        'GUAM GU',
        'HAWAII',
        'IDAHO',
        'ILLINOIS',
        'INDIANA',
        'IOWA',
        'KANSAS',
        'KENTUCKY',
        'LOUISIANA',
        'MAINE',
        'MARSHALL ISLANDS',
        'MARYLAND',
        'MASSACHUSETTS',
        'MICHIGAN',
        'MINNESOTA',
        'MISSISSIPPI',
        'MISSOURI',
        'MONTANA',
        'NEBRASKA',
        'NEVADA',
        'NEW HAMPSHIRE',
        'NEW JERSEY',
        'NEW MEXICO',
        'NEW YORK',
        'NORTH CAROLINA',
        'NORTH DAKOTA',
        'NORTHERN MARIANA ISLANDS',
        'OHIO',
        'OKLAHOMA',
        'OREGON',
        'PALAU',
        'PENNSYLVANIA',
        'PUERTO RICO',
        'RHODE ISLAND',
        'SOUTH CAROLINA',
        'SOUTH DAKOTA',
        'TENNESSEE',
        'TEXAS',
        'UTAH',
        'VERMONT',
        'VIRGIN ISLANDS',
        'VIRGINIA',
        'WASHINGTON',
        'WEST VIRGINIA',
        'WISCONSIN',
        'WYOMING'];

      $user = User::where('id', Auth::id())->first();
      $school = School::where('id', $user->school_id)->first();
      return view('auth.edit-profile', compact('school', 'states'));

    }

    public function edit(Request $data)
    {

      $user = User::where('id', Auth::id())->first();
      $school = School::where('id', $user->school_id)->first();

      $today=date("Y-m-d");
      $now = time();

      if(is_null($data->file('user_image'))) {

      } else {
      $user_image = $data->file('user_image');
      $extension = $user_image->getClientOriginalExtension();
      $name = $user->name;
      $fileName = $name.'_'.$now.'.'.$extension;
      $destinationPath = 'img/user_icons/';
      $upload_success = $user_image->move($destinationPath, $fileName);
      if($upload_success) {
        $user->user_picture = $fileName;
      } else {
        return 'Something went wrong...';
      }
      }
      $user->fName = $data->fName;
      $user->lName = $data->lName;
      $user->orgName = $data->orgName;
      $user->email = $data->email;
      if($user->accountType = "Organization") {
        $user->org_type = $data->category;
        $user->adminEmail = $data->adminEmail;
      }
      $user->city = $data->city;
      $user->state = $data->state;
      $user->zipcode = $data->zipcode;
      $user->newsletter = $data->newsletter;
      $user->save();

      $school = School::where('id', $user->school_id)->first();

      return view('profile', compact('school'));
    }

    public function contact(Request $data) {

    }
}
