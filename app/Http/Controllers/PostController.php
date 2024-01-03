<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Notification;
use App\Models\Pet;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

use function PHPUnit\Framework\returnCallback;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $images = [];
        if ($request->hasFile('image')) {
            foreach ($request->image as $file) {
                $image_name = 'post-' . rand(10000, 99999) . '-' . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img/posts'), $image_name);
                $images[] = $image_name;
            }
        }
        $serialized_image_name = json_encode($images);
        $user = User::where('username', Session::get('username'))->first();
        $data = [
            'user_id' => $user->id,
            'content' => $request->post_content,
            'pet_category' => $request->pet_category,
            'pet_type' => $request->pet_type,
            'image' => $serialized_image_name
        ];
        if (Post::create($data)) {
            return redirect('/')->with('success', 'Successfully Added Post');
        } else {
            return redirect('/')->with('fail', 'Failed to add Post');
        }
    }

    public function submitComment(Request $request)
    {
        $path = $request->path();
        $user = User::where('username', Session::get('username'))->first();
        $data = [
            'pet_id' => $request->pet_id,
            'user_id' => $user->id,
            'comment' => $request->comment
        ];
        $redirect = $path === 'submit-comment' ? '/' : ($path === 'view-post-submit-comment' ? 'view-post?pet_id=' . $request->pet_id : 'view-posts');
        if (Comment::create($data)) {
            $pet = Pet::where('id', $request->pet_id)->first();
            if ($user->id == $pet->user_id) {
                return redirect($redirect)->with('success', 'Successfully Added Comment');
            }
            $notification = [
                'user_id' => $user->id,
                'reference_user_id' => $pet->user_id,
                'pet_id' => $pet->id,
                'content' => $user->fullname . ' has commented on your post.',
                'type' => 'comment',
                'status' => 'unread'
            ];
            Notification::create($notification);
            return redirect($redirect)->with('success', 'Successfully Added Comment');
        } else {
            return redirect($redirect)->with('fail', 'Failed to add Comment');
        }
    }
    public function viewPost(Request $request)
    {
        $id = $request->pet_id ? $request->pet_id : null;
        return view('viewpost', compact('id'));
    }

    public function viewAdminPost(Request $request)
    {
        $id = $request->pet_id ? $request->pet_id : null;
        return view('admin.post', compact('id'));
    }
}
