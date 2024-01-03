<?php

namespace App\View\Components;

use App\Models\Service;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class ViewService extends Component
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
        $path = Request::path();
        $slug = explode("/", $path);
        $service_slug = $slug[1];
        $service = Service::where('slug', $service_slug)->first();
        return view('components.view-service', compact("service"));
    }
}
