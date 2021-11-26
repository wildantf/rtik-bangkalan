<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;
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


    public function store(PostRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', [$validatedData['title'], ' has been added!']);
    }


    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post,
        ]);
    }


    public function edit(Post $post)
    {
        // control access
        
        $this->access_control($post);

        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }


    public function update(PostRequest $request, Post $post)
    {
        dd($request->route());
        // control access
        $this->access_control($post);

        $post_title = $request->title;
        // validasi data
        $validatedData = $request->validated();

        // otomasi create data excerpt
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        if ($request->file('image')) {
            Storage::delete($post->image);
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $post->update($validatedData);
        return redirect(route('dashboard.posts.index'))->with('success', [$post_title, ' has been edited!']);
    }


    public function destroy(Post $post)
    {
        $post_title = $post->title;

        // control access
        $this->access_control($post);

        // delete image post
        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);

        return redirect(route('dashboard.posts.index'))->with('warning', [$post_title, ' has been deleted!']);
    }

    // FIXME : Jadikan middleware
    private function access_control($model)
    {
        //get user object
        $user = User::find(auth()->user()->id);

        // control access
        return abort_unless($user->id === $model->user_id || $user->hasAnyRole(['admin', 'super-admin']), 500);
    }
}
