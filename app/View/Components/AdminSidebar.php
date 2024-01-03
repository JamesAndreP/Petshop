<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class AdminSidebar extends Component
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
        $user = User::where('username', Session::get('username'))->first();
        return view('components.admin-sidebar', compact('user'));
    }
}
