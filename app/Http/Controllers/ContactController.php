<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $email = $request->email;
        $reason = $request->reason;
        $msg = $request->message;
        // if (mail("jennpride08@gmail.com", $reason, $msg)) {
        //     $message = "We&#39;ll review on our side and be in touch.";
        //     return view('success')->with('message', $message);
        // } else {
            $message = "Something went wrong. Could you give us a minute?";
            return view('whoops')->with('message', $message);
        // }
    }
}
