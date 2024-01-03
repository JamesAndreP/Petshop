<?php

namespace App\View\Components;

use App\Models\PetCategory as ModelsPetCategory;
use Illuminate\View\Component;

class PetCategory extends Component
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
        $pet_category = ModelsPetCategory::get();
        return view('components.pet-category', compact('pet_category'));
    }
}
