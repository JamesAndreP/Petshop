<?php

namespace App\View\Components;

use App\Models\Comment;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class AdminPosts extends Component
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
        $posts = Pet::selectRaw('pets.*, users.fullname')
            ->join('users', 'pets.user_id', 'users.id')
            ->where('users.username', Session::get('username'))
            ->where('pets.approval_status', 'APPROVED')
            ->where('pets.status', 'AVAILABLE')
            ->orderBy('pets.created_at', 'desc')
            ->get()
            ->map(function ($pet) {
                $pet->comments = Comment::where('pet_id', $pet->id)
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->map(function ($comment) {
                        $user = User::where('id', $comment->user_id)->first();
                        $comment->name = $user->fullname;
                        $comment->avatar = $user->avatar;
                        return $comment;
                    });
                return $pet;
            });
        return view('components.admin-posts', compact("posts"));
    }
}
