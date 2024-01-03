<?php

namespace App\View\Components;

use App\Models\PetType as ModelsPetType;
use Illuminate\View\Component;

class PetType extends Component
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
        $pet_type = ModelsPetType::get();
        return view('components.pet-type', compact('pet_type'));
    }
}
