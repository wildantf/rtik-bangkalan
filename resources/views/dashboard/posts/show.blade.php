@extends('dashboard.layouts.main')
@section('content')


    <div class="flex-row my-3 dark:bg-gray-800 p-4 rounded-lg">
        <div class="flex-row">
            <h1 class="mb-3 text-2xl dark:text-gray-200">{{ $post->title }}</h1>
            <div class="inline-flex justify-around mb-3">
                <a href="/dashboard/posts" class="bg-green-400 px-4 py-2 rounded-lg bg-opacity-80 hover:bg-opacity-100"><span
                        data-feather="arrow-left"></span> Back to all my
                    post</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit"
                    class="bg-yellow-400 px-4 mx-2 py-2 rounded-lg bg-opacity-80 hover:bg-opacity-100"><span
                        data-feather="edit"></span>
                    Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="bg-red-400 px-4 py-2 rounded-lg bg-opacity-80 hover:bg-opacity-100 "
                        onclick="return confirm('Are you sure delete this post?')"><span data-feather="x-circle"> </span>
                        Delete</button>
                </form>
            </div>
        </div>
        <div>
            <img src="{{ isset($post->image) ? asset('storage/' . $post->image) : 'https://dummyimage.com/1000x400/d4d4d4/ffffff&text=Image+not+found' }}"
                class="h-auto w-full object-cover object-center" alt="{{ $post->category->slug }}">
            <!-- AGAR TAGNYA TIDAK DI ESCAPE PHP -->
            <article class="my-3 dark:text-gray-200">{!! $post->body !!}</article>
        </div>
    </div>



@endsection
