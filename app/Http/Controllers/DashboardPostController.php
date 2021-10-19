<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardPostController extends Controller
{
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::latest()->where('user_id', auth()->user()->id)->get(),
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

        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
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
        $post_title=$request->title;

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

        // FIXME: atur agar navbar tidak mengearah hanya ke my post
        if (Str::contains($request->getRequestUri(),'dashboard/posts')){
            return redirect('/dashboard/posts')->with('success', [$post_title,' has been edited!']);
        } 
        else{
            return redirect('/dashboard/all-posts')->with('success', [$post_title,' has been edited!']);
        }
    }


    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
