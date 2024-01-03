<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function addAdmin(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'fullname' => 'required',
            'avatar' => 'required',
            'email' => 'required|unique:users',
            'contact' => 'required',
        ]);
        $image_name = '';
        if ($request->has('avatar')) {
            $var = date_create();
            $time = date_format($var, 'YmdHis');
            $image_name = $request->username . '-' . $time . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('img/avatars'), $image_name);
        }
        $data = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'fullname' => $request->fullname,
            'avatar' => $image_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'status' => 'active',
            'type' => 'admin'
        ];
        if (User::create($data)) {
            return redirect('admin/add-new-admin')->with('success', 'Successfully Added New Admin');
        } else {
            return redirect('admin/add-new-admin')->with('fail', 'Fail to add admin');
        }
    }
}
