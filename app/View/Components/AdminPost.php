<?php

namespace App\View\Components;

use App\Models\Comment;
use App\Models\Pet;
use App\Models\User;
use Illuminate\View\Component;

class AdminPost extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id = null;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $post = Pet::selectRaw('pets.*, users.fullname')
            ->join('users', 'pets.user_id', 'users.id')
            ->where('pets.id', $this->id)
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
        $post = $post[0];
        return view('components.admin-post', compact("post"));
    }
}
