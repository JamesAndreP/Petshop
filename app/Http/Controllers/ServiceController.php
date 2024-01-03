<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    public function addService(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required',
            'service_detail' => 'required',
            'slug' => 'required|unique:services'
        ]);
        $user = User::where('username', Session::get('username'))->first();
        $data = [
            'service_name' => $request->service_name,
            'service_detail' => $request->service_detail,
            'read_more' => $request->more_detail,
            'slug' => $request->slug,
            'user_id' => $user->id,
            'status' => 'active'
        ];
        if (Service::create($data)) {
            return redirect('admin/services')->with('success', 'Successfully added Service');
        } else {
            return redirect('admin/services')->with('fail', 'Failed to add Service');
        }
    }

    public function updateService(Request $request)
    {
        $update = Service::where('id', $request->service_id)
            ->update([
                'service_name' => $request->service_name,
                'service_detail' => $request->service_detail,
                'read_more' => $request->more_detail,
                'slug' => $request->slug,
                'status' => $request->status,
            ]);
        if ($update) {
            return redirect('admin/services')->with('success', 'Successfully updated Service');
        } else {
            return redirect('admin/services')->with('fail', 'Failed to update Service');
        }
    }

    public function deleteService(Request $request)
    {
        if (Service::where('id', $request->service_id)->delete()) {
            return redirect('admin/services')->with('success', 'Successfully deleted Service');
        } else {
            return redirect('admin/services')->with('fail', 'Failed to delete Service');
        }
    }
}
