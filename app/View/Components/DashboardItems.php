<?php

namespace App\View\Components;

use App\Models\Pet;
use App\Models\PetProduct;
use App\Models\Service;
use App\Models\User;
use Illuminate\View\Component;

class DashboardItems extends Component
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
        $pet_for_selling = Pet::selectRaw('COUNT(id) as count')
            ->where('pet_type', 'SELLING')
            ->where('status', 'AVAILABLE')
            ->where('approval_status', 'APPROVED')
            ->first();
        $pet_for_adoption = Pet::selectRaw('COUNT(id) as count')
            ->where('pet_type', 'ADOPTION')
            ->where('status', 'AVAILABLE')
            ->where('approval_status', 'APPROVED')
            ->first();
        $users = User::selectRaw('COUNT(id) as count')
            ->where('type', 'user')
            ->where('status', 'active')
            ->first();
        $services = Service::selectRaw('COUNT(id) as count')
            ->where('status', 'active')
            ->first();
        $products = PetProduct::selectRaw('COUNT(id) as count')
            ->where('status', 'active')
            ->first();
        return view('components.dashboard-items', compact('pet_for_selling', 'pet_for_adoption', 'users', 'services', 'products'));
    }
}
