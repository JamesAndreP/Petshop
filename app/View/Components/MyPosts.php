<?php

namespace App\View\Components;

use App\Models\Comment;
use App\Models\Pet;
use App\Models\PetCategory;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class MyPosts extends Component
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
        $posts = Pet::where('user_id', $user->id)
            ->where('approval_status', 'APPROVED')
            ->where('status', 'AVAILABLE')
            ->orderBy('created_at', 'desc')
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
        $category = PetCategory::get();
        return view('components.my-posts', compact('posts', 'category'));
    }
}
