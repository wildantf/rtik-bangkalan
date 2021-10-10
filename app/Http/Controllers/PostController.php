<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {   
        // mengecek postingan sudah dapat izin publish atau belum
        $posts=Post::where('publish_status','1');

        $title='';

        if(request('category')){
            $category=Category::firstWhere('slug',request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('author')) {
            $author=User::firstWhere('username',request('author'));
            $title= ' by ' . $author->name;
        }

        return view('posts', [
            "title" => 'All Post'. $title,
            "posts" => $posts->latest()->filter(request(['search','category','author']))->paginate(7)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => 'Single Post',
            "post" => $post,
        ]);
    }
}
