<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        session()->pull('username');
        $user = User::where('username', $request->username)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password) && $user->verification_status == 'approved') {
                session(['username' => $user->username]);
                if ($user->type == 'user') {
                    session(['type' => 'user']);
                    return redirect('/')->with('success', 'Successfully logged in');
                } else if ($user->type == 'admin') {
                    session(['type' => 'admin']);
                    return redirect('admin/dashboard')->with('success', 'Sucessfully logged in');
                }
            } else {
                return redirect('/')->with('fail', 'Incorrect Username or password');
            }
        } else {
            return redirect('/')->with('fail', 'Incorrect Username or password');
        }
    }

    public function logout()
    {
        session()->pull('username');
        session()->pull('type');
        return redirect('/');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'fullname'          => 'required',
            'username'          => 'required|unique:users',
            'password'          => 'required',
            'confirm_password'  => 'required',
            'email'             => 'required|email|unique:users',
            'contact'           => 'required',
        ]);
        $image_name = '';
        if ($request->hasFile('avatar')) {
            $var = date_create();
            $random_num = rand(1000, 10000);
            $time = date_format($var, 'YmdHis');
            $image_name = $validated['username'] . '-' . $random_num . '-' . $request->avatar->getClientOriginalName();
            $file_upload = $request->avatar->move(public_path('/img/avatars'), $image_name);
            if (!$file_upload) {
                return redirect('/register')->with('fail', 'Failed to upload avatar.');
            }
        }
        $verification_code = rand(012345, 999999);
        $user_data = [
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'fullname' => $validated['fullname'],
            'avatar' => $image_name,
            'email' => $validated['email'],
            'contact' => $validated['contact'],
            'status' => 'active',
            'verification_code' => $verification_code,
            'verification_status' => 'pending',
            'type' => 'user',
        ];
        if ($user = User::create($user_data)) {
            session(['email' => $user->email]);
            // return redirect('/')->with('success', 'Successfully created account');
            $details = [
                'title' => 'Verification Code',
                'body' => 'Your Verification Code is ',
                'verification_code' => $user->verification_code
            ];
            Mail::to($user->email)->send(new \App\Mail\VerificationMail($details));
            return redirect('/verification');
        } else {
            return redirect('/register')->with('fail', 'Failed to create account');
        }
    }

    public function verifyEmail(Request $request)
    {
        $validated = $request->validate([
            'verification_code' => 'required'
        ]);

        $user = User::where('email', Session::get('email'))->first();
        if ($user->verification_code == $request->verification_code) {
            $user->update(['verification_status' => 'approved']);
            session()->pull('email');
            session(['type' => 'user']);
            session(['username' => $user->username]);
            return redirect('/')->with('success', 'Successfully created account');
        } else {
            return redirect('/verification')->with('fail', 'Incorrect verification code');
        }
    }
}
