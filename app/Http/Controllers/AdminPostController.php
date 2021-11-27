<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class AdminPostController extends Controller
{
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::latest()->where('user_id', '<>', auth()->user()->id)->paginate(10)->withQueryString(),
        ]);
    }


    // FIXME : optimasi codingan publish button
    public function updatePublishStatus(Request $request, Post $post)
    {
        // return dd($post);
        $data = ["publish_status" => $request->publish_status];
        $post->update($data);

        return back();
    }
}
