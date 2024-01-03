<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendVerification(Request $request)
    {
        $details = [
            'title' => 'Verification Code',
            'body' => 'Your Verification Code is ',
            'verification_code' => '1234'
        ];
        Mail::to('jamesandrep25@gmail.com')->send(new \App\Mail\VerificationMail($details));
        dd("Email is Sent.");
    }
}
