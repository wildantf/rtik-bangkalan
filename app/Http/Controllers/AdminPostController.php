<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::latest()->where('user_id', '<>', auth()->user()->id)->paginate(10)->withQueryString(),
        ]);
    }

    public function edit(Post $all_post)
    {
        
        return view('dashboard.posts.edit', [
            'post' => $all_post,
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, Post $all_post)
    {
        $post_title = $request->title;

        $rules = [
            "title" => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ];

        if ($request->slug != $all_post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validateData = $request->validate($rules);


        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        if ($request->file('image')){
            Storage::delete($request->oldImage);

            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $all_post->update($validateData);

        return redirect('/dashboard/all-posts')->with('success', [$post_title, ' has been edited!']);
    }

    public function show(Post $all_post)
    {
        return view('dashboard.posts.show', [
            'post' => $all_post,
        ]);
    }

    public function destroy(Post $all_post)
    {
        $post_title = $all_post->title;
        if ($all_post->image) {
            Storage::delete($all_post->image);
        }

        Post::destroy($all_post->id);

        return redirect('/dashboard/all-posts')->with('success', [$post_title, ' has been deleted!']);
    }

    // FIXME : optimasi codingan publish button
    public function updatePublishStatus(Request $request, Post $post)
    {   
        // return dd($post);
        $data = ["publish_status" => $request->publish_status];
        Post::where('id', $post->id)
            ->update($data);

        return back();
    }
}
