<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\PetCategory;
use App\Models\PetType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    public function addPetCategory(Request $request)
    {
        $user = User::where('username', Session::get('username'))->first();
        $data = [
            'user_id' => $user->id,
            'category_name' => $request->category_name
        ];
        if (PetCategory::create($data)) {
            return redirect('admin/pet-management')->with('success', 'Successfully added Pet Category');
        } else {
            return redirect('admin/pet-management')->with('fail', 'Failed to add Pet Category');
        }
    }

    public function updatePetCategory(Request $request)
    {
        if (PetCategory::where('id', $request->pet_category_id)->update(['category_name' => $request->category_name])) {
            return redirect('/pet-category')->with('success', 'Successfully updated Pet Category');
        } else {
            return redirect('/pet-category')->with('fail', 'Failed to update Pet Category');
        }
    }

    public function deletePetCategory(Request $request)
    {
        if (PetCategory::where('id', $request->pet_category_id)->delete()) {
            return redirect('/pet-category')->with('success', 'Successfully deleted Pet Category');
        } else {
            return redirect('/pet-category')->with('fail', 'Failed to delete Pet Category');
        }
    }

    public function addPetType(Request $request)
    {
        if (PetType::create(['type' => $request->type])) {
            return redirect('/pet-type')->with('success', 'Successfully added Pet Type');
        } else {
            return redirect('/pet-type')->with('fail', 'Failed to add Pet Type');
        }
    }

    public function updatePetType(Request $request)
    {
        if (PetType::where('id', $request->pet_type_id)->update(['type' => $request->type])) {
            return redirect('/pet-type')->with('success', 'Successfully updated Pet Type');
        } else {
            return redirect('/pet-type')->with('fail', 'Failed to update Pet Type');
        }
    }

    public function deletePetType(Request $request)
    {
        if (PetType::where('id', $request->pet_type_id)->delete()) {
            return redirect('/pet-type')->with('success', 'Successfully deleted Pet Type');
        } else {
            return redirect('/pet-type')->with('fail', 'Failed to delete Pet Type');
        }
    }

    public function addPet(Request $request)
    {
        $path = $request->path();
        $user = User::where('username', Session::get('username'))->first();
        $image_name = '';
        if ($request->has('file')) {
            foreach ($request->file as $file) {
                $image_name = 'post-' . rand(10000, 99999) . '-' . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img/pet avatars'), $image_name);
                $images[] = $image_name;
            }
        }
        $serialized_image_name = json_encode($images);
        $approval_status = $path === 'add-pet' || $path === 'my-posts' ? 'PENDING' : 'APPROVED';
        $data = [
            'description' => $request->description,
            'pet_type' => strtoupper($request->pet_type),
            'image' => $serialized_image_name,
            'status' => 'AVAILABLE',
            'approval_status' => $approval_status,
            'pet_category' => strtoupper($request->pet_category),
            'user_id' => $user->id
        ];
        if (Pet::create($data)) {
            if ($path === 'add-pet') {
                return redirect('/')->with('success', 'Successfully Added Pet');
            } else if ($path === 'add-post-from-mypost') {
                return redirect('/my-posts')->with('success', 'Successfully Added Pet');
            } else {
                return redirect('admin/pet-management')->with('success', 'Successfully Added Pet');
            }
        } else {
            if ($path === 'add-pet') {
                return redirect('/')->with('fail', 'Failed to add Pet');
            } else {
                return redirect('admin/pet-management')->with('fail', 'Failed to add Pet');
            }
        }
    }

    public function updatePet(Request $request)
    {
        $pet = Pet::where('id', $request->pet_id)->first();
        $image_name = '';
        if ($request->has('file')) {
            if (File::exists(public_path('img/pet avatars/' . $pet->image))) {
                File::delete(public_path('img/pet avatars/' . $pet->image));
            }
            $var = date_create();
            $time = date_format($var, 'YmdHis');
            $image_name = 'petavatar-' . $time . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('img/pet avatars'), $image_name);
        }
        $update = Pet::where('id', $request->pet_id)
            ->update([
                'pet_category' => $request->pet_category,
                'pet_type' => $request->pet_type,
                'description' => $request->description,
                'image' => $image_name != '' ? $image_name : $pet->image
            ]);
        if ($update) {
            return redirect('admin/pet-management')->with('success', 'Successfully updated Pet');
        } else {
            return redirect('admin/pet-management')->with('fail', 'Failed to update Pet');
        }
    }

    public function deletePet(Request $request)
    {
        $pet = Pet::where('id', $request->pet_id)->first();
        if (File::exists(public_path('img/pet avatars/' . $pet->image))) {
            File::delete(public_path('img/pet avatars/' . $pet->image));
        }
        if (Pet::where('id', $request->pet_id)->delete()) {
            return redirect('admin/pet-management')->with('success', 'Successfully deleted Pet');
        } else {
            return redirect('admin/pet-management')->with('fail', 'Failed to delete Pet');
        }
    }

    public function approvePet(Request $request)
    {
        if (Pet::where('id', $request->pet_id)->update(['approval_status' => 'APPROVED'])) {
            return redirect('admin/pet-approval')->with('success', 'Successfully approved pet');
        } else {
            return redirect('admin/pet-approval')->with('fail', 'Failed to approve pet');
        }
    }

    public function updatePetUnavailable(Request $request)
    {
        if (Pet::where('id', $request->pet_id)->update(['status' => 'UNAVAILABLE'])) {
            return redirect($request->page_name == 'selling' ? 'admin/available-pet-selling' : 'admin/available-pet-adoption')
                ->with('success', 'Successfully updated pet status');
        } else {
            return redirect($request->page_name == 'selling' ? 'admin/available-pet-selling' : 'admin/available-pet-adoption')
                ->with('fail', 'Failed to update pet status');
        }
    }

    public function updatePetAvailable(Request $request)
    {
        if (Pet::where('id', $request->pet_id)->update(['status' => 'AVAILABLE'])) {
            return redirect($request->page_name == 'sold' ? 'admin/sold-pets' : 'admin/adopted-pets')
                ->with('success', 'Successfully updated pet status');
        } else {
            return redirect($request->page_name == 'sold' ? 'admin/sold-pets' : 'admin/adopted-pets')
                ->with('fail', 'Failed to update pet status');
        }
    }

    public function test(Request $request)
    {
        // $var = date_create();
        // $random_num = rand(1000, 10000);
        // $time = date_format($var, 'YmdHis');
        // // $image_name = $validated['username'].'-'.$random_num.'-'.$request->avatar->getClientOriginalName();
        // $image_name = $random_num . '-' . $request->file->getClientOriginalName();
        // $file_upload = $request->file->move('../../images', $image_name);
        // // Storage::disk('avatar')->put('123', $request->file);
        $image_name = '123' . $request->file->getClientOriginalName();
        $request->file->move(public_path('img/pet avatars'), $image_name);
    }
}
