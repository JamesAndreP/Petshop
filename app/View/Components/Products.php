<?php

namespace App\View\Components;

use App\Models\PetProduct;
use Illuminate\View\Component;

class Products extends Component
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
        $products = PetProduct::where('status', 'active')
            ->where('quantity', '>', '0')
            ->get();
        return view('components.products', compact('products'));
    }
}
