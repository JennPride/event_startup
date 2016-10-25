@extends('layouts.app')

@section('content')
<section class="profile">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
  <div class="container">
    <div class="table">
      <div class="col-lg-12">
        <div class="team text-center">
          <div class="cover" style="background: black; background-size:cover;">
          </div>
          <img src="img/user_icons/{{ Auth::user()->user_picture }}" alt="Team Image" class="avatar">
          <div class="title">
            <h3>{{ Auth::user()->name }}</h3>
            @if (Auth::user()->accountType == 'Personal')
              <h2>{{ Auth::user()->fName }} {{ Auth::user()->lName }}</h2>
                  <p> Email : {{ Auth::user()->email }} </p>
                  <p> Member Since : {{ Auth::user()->created_at}} </p>
                  <p> School : {{ $school->schoolName }} </p>
                  <p> City : {{ Auth::user()->city }} </p>
                  <p> State : {{ Auth::user()->state }} </p>
                  <p> Zipcode : {{ Auth::user()->zipcode }} </p>
                  <p> Account Type : {{ Auth::user()->accountType}} </p>
              @elseif (Auth::user()->accountType == 'Organization')
                <h2>{{ Auth::user()->orgName }}</h2>
                    <p> Email : {{ Auth::user()->email }} </p>
                    <p> Member Since : {{date("F n, Y", strtotime(Auth::user()->created_at))}} </p>
                    <p> School : {{ $school->schoolName }} </p>
                    <p> City : {{ Auth::user()->city }} </p>
                    <p> State : {{ Auth::user()->state }} </p>
                    <p> Zipcode : {{ Auth::user()->zipcode }} </p>
                    <p> Account Type : {{ Auth::user()->accountType}} </p>
                    <p> Organization Category: {{Auth::user()->org_type}} </p>
                    <p> Admin Name : {{ Auth::user()->fName }} {{ Auth::user()->lName }} </p>
                    <p> Admin Email : {{ Auth::user()->adminEmail }} </p>
                @endif
        </div>
        <a href="edit-profile"><button class="btn btn-blue-fill"> Edit Profile </button> </a>
      </div>
    </div>
  </div>
  </div>

</section>

@stop
