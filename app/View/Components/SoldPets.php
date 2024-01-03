<?php

namespace App\View\Components;

use App\Models\Pet;
use Illuminate\View\Component;

class SoldPets extends Component
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
        $pet = Pet::where('pet_type', 'SELLING')
            ->where('status', 'UNAVAILABLE')
            ->where('approval_status', 'APPROVED')
            ->get();
        return view('components.sold-pets', compact('pet'));
    }
}
