<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $schools = \App\School::all();
    return view('welcome', compact('schools'));
});
Route::get('/profile-choice', function () {
    return view('auth.profile-choice');
});
Route::get('/submit-event', 'EventController@showForm');
Route::post('/submit-event', 'EventController@submitOrCharge');

Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

// Registration Routes...
Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);

Route::get('personal', function() {

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

  $schools = \App\School::all();
  return view('auth.personal', compact('schools', 'states'));
});

Route::get('organization', function() {
  $schools = \App\School::all();
  return view('auth.organization', compact('schools'));
});

Route::get('company', function() {
  $schools = \App\School::all();
  return view('auth.company', compact('schools'));
});


Route::get('schools', 'SchoolController@showAll');
Route::get('/schools/{school}', 'SchoolController@showSchool');

Route::get('suggestion-form', function() {
  return view('suggestion-form');
});

Route::post('suggest', 'SchoolController@suggest');
// Password Reset Routes...
Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);

Route::get('/home', 'HomeController@index');

Route::post('submit-payment', 'EventController@submitPayment');

Route::get('/profile', 'ProfileController@index');

Route::get('event-search', 'HomeController@search');

Route::get('manage-events', 'EventController@manage');
Route::get('{event}/edit-event', 'EventController@viewEditor');
Route::get('{event}/edit-merch', 'MerchandiseController@viewMerchChoice');
Route::get('{event}/merch-form', 'MerchandiseController@viewEditor');

Route::patch('{event}/submit-event-change', 'EventController@editEvent');

Route::get('other-school', 'EventController@otherSchool');

Route::get('edit-profile', 'ProfileController@showEditor');
Route::post('submit-edit-profile', 'ProfileController@edit');


Route::post('likeEvent', 'EventController@likeEvent');

Route::get('success', function() {
  return view('success');
});

Route::get('events/{event}', 'EventController@showEventPage');

Route::get('about', function() {
  return view('about');
});

Route::get('contact', function() {
  return view('contact');
});

Route::post('contact', 'ContactController@contact');
