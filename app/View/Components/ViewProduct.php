<?php

namespace App\View\Components;

use App\Models\PetProduct;
use Illuminate\View\Component;

class ViewProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id = null;
    public function __construct($id)
    {
        //
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $product = PetProduct::where('id', $this->id)->first();
        return view('components.view-product', compact("product"));
    }
}
