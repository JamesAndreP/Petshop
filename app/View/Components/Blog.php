<?php

namespace App\View\Components;

use App\Models\Comment;
use App\Models\Pet;
use App\Models\PetCategory;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class Blog extends Component
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
        // $posts = Post::orderBy('created_at', 'desc')
        //     ->get()
        //     ->map(function ($post) {
        //         $post->comments = Comment::where('post_id', $post->id)
        //             ->orderBy('created_at', 'desc')
        //             ->get()
        //             ->map(function ($comment) {
        //                 $user = User::where('id', $comment->user_id)->first();
        //                 $comment->name = $user->fullname;
        //                 $comment->avatar = $user->avatar;
        //                 return $comment;
        //             });
        //         return $post;
        //     });
        $posts = Pet::selectRaw('pets.*, users.fullname')
            ->join('users', 'pets.user_id', 'users.id')
            ->where('pets.approval_status', 'APPROVED')
            ->where('pets.status', 'AVAILABLE')
            ->orderBy('pets.created_at', 'desc')
            ->when(Request::path() === '/', function ($query) {
                $query->limit(4);
            })
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
        return view('components.blog', compact('posts', 'category'));
    }
}
