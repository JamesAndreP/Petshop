<?php

namespace App\View\Components;

use App\Models\PetProduct;
use Illuminate\View\Component;

class ViewProducts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $products = PetProduct::orderBy('product_category', 'asc')->get();
        return view('components.view-products', compact('products'));
    }
}
