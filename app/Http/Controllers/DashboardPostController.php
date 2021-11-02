<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class DashboardPostController extends Controller
{
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::latest()->where('user_id', auth()->user()->id)->paginate(10)->withQueryString(),
            // 'posts'=> User::find(auth()->user()->id)->posts()->get(),
        ]);
    }


    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            "title" => 'required|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'body' => 'required|min:300',
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validateData);

        return redirect('/dashboard/posts')->with('success', [$validateData['title'], ' has been added!']);
    }


    public function show(Post $post)
    {
        // dd($post);
        return view('dashboard.posts.show', [
            'post' => $post,
        ]);
    }


    public function edit(Post $post)
    {
        if (auth()->user()->id === $post->user_id) {
            return view('dashboard.posts.edit', [
                'post' => $post,
                'categories' => Category::all(),
            ]);
        } else {
            abort(500);
        }
    }


    public function update(Request $request, Post $post)
    {
        $post_title = $request->title;

        $rules = [
            "title" => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validateData = $request->validate($rules);


        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        if ($request->file('image')) {
            Storage::delete($request->oldImage);
            $validateData['image'] = $request->file('image')->store('post-images');
        }
        $post->update($validateData);

        return redirect('/dashboard/posts')->with('success', [$post_title, ' has been edited!']);
    }


    public function destroy(Post $post)
    {
        $post_title = $post->title;
        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('warning', [$post_title, ' has been deleted!']);
    }
}
