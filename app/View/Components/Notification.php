<?php

namespace App\View\Components;

use App\Models\Notification as ModelsNotification;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class Notification extends Component
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
        $notification = ModelsNotification::selectRaw('count(id) as count')
            ->where('reference_user_id', $user->id)
            ->where('status', 'unread')
            ->first();
        return view('components.notification', compact('notification'));
    }
}
