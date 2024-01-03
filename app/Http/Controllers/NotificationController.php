<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
{
    //
    public function getNotification(Request $request)
    {
        $user = User::where('username', Session::get('username'))->first();
        Notification::where('reference_user_id', $user->id)->update(['status' => 'read']);
        return Notification::where('reference_user_id', $user->id)->get();
    }
}
