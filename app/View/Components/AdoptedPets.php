<?php

namespace App\View\Components;

use App\Models\Pet;
use Illuminate\View\Component;

class AdoptedPets extends Component
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
        $pet = Pet::where('pet_type', 'ADOPTION')
            ->where('status', 'UNAVAILABLE')
            ->where('approval_status', 'APPROVED')
            ->get();
        return view('components.adopted-pets', compact('pet'));
    }
}
