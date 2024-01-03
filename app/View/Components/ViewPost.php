<?php

namespace App\View\Components;

use App\Models\Comment;
use App\Models\Pet;
use App\Models\PetCategory;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class ViewPost extends Component
{
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
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
        $post = Pet::where('id', $this->id)
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
        $post = $post[0];
        return view('components.view-post', compact('post'));
    }
}
