<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('dashboard.posts.allPosts', [
            'posts' => Post::latest()->where('user_id', '<>', auth()->user()->id)->paginate(10)->withQueryString(),
        ]);
    }
    public function edit(Post $all_post)
    {
        // dd('yes');
        return view('dashboard.posts.edit', [
            'post' => $all_post,
            'categories' => Category::all(),
        ]);
    }
    
    // FIXME : optimasi codingan publish button
    public function updatePublishStatus(Request $request, Post $post)
    {
        $data = ["publish_status" => $request->publish_status];
        Post::where('id', $post->id)
            ->update($data);

        return back();
    }
}
