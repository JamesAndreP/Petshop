<?php

namespace App\View\Components;

use App\Models\Service;
use Illuminate\View\Component;

class AdminServices extends Component
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
        $service = Service::selectRaw('services.*, users.username')
            ->join('users', 'services.user_id', 'users.id')
            ->get();
        return view('components.admin-services', compact('service'));
    }
}
