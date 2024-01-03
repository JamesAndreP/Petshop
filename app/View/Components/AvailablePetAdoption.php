<?php

namespace App\View\Components;

use App\Models\Pet;
use Illuminate\View\Component;

class AvailablePetAdoption extends Component
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
        $pet = Pet::where('status', 'AVAILABLE')
            ->where('approval_status', 'APPROVED')
            ->where('pet_type', 'ADOPTION')
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('components.available-pet-adoption', compact('pet'));
    }
}
