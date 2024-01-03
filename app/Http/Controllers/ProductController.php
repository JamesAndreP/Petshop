<?php

namespace App\Http\Controllers;

use App\Models\PetProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $image_name = '';
        if ($request->has('file')) {
            $image_name = 'product-' . rand(10000, 99999) . '-' . rand(10000, 99999) . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('img/products'), $image_name);
        }
        $data = [
            'name' => $request->product_name,
            'details' => $request->product_detail,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => 'active',
            'product_category' => $request->product_category,
            'slug' => $request->slug,
            'image' => $image_name
        ];
        if (PetProduct::create($data)) {
            return redirect('admin/products')->with('success', 'Successfully added Product');
        } else {
            return redirect('admin/products')->with('fail', 'Failed to add Product');
        }
    }

    public function updateProduct(Request $request)
    {
        $update = PetProduct::where('id', $request->product_id)
            ->update([
                'name' => $request->product_name,
                'details' => $request->product_detail,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'status' => $request->status,
                'product_category' => $request->product_category,
                'slug' => $request->slug,
            ]);
        if ($update) {
            return redirect('admin/products')->with('success', 'Successfully updated Product');
        } else {
            return redirect('admin/products')->with('fail', 'Failed to update Product');
        }
    }

    public function deleteProduct(Request $request)
    {
        if (PetProduct::where('id', $request->product_id)->delete()) {
            return redirect('admin/products')->with('success', 'Successfully deleted Product');
        } else {
            return redirect('admin/products')->with('fail', 'Failed to delete Product');
        }
    }

    public function viewProduct(Request $request)
    {
        $id = $request->product_id ? $request->product_id : null;
        return view('viewproduct', compact("id"));
    }
}
