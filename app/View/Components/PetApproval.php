<?php

namespace App\View\Components;

use App\Models\Pet;
use Illuminate\View\Component;

class PetApproval extends Component
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
        $pet = Pet::where('approval_status', 'PENDING')->get();
        return view('components.pet-approval', compact('pet'));
    }
}
