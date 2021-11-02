@extends('dashboard.layouts.main')
@section('content')


    <div class="inline-flex justify-around mb-3">
        <a href="/dashboard/posts"
            class="flex items-center bg-cyan-200 dark:bg-cyan-700 px-4 py-2 rounded-lg dark:hover:bg-cyan-600 dark:text-cyan-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>&nbsp; Back</a>
        {{-- <a href="/dashboard/posts/{{ $post->slug }}/edit"
        class="bg-yellow-400 px-4 mx-2 py-2 rounded-lg bg-opacity-80 hover:bg-opacity-100"><span
            data-feather="edit"></span>
        Edit</a>
    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button class="bg-red-400 px-4 py-2 rounded-lg bg-opacity-80 hover:bg-opacity-100 "
            onclick="return confirm('Are you sure delete this post?')"><span data-feather="x-circle"> </span>
            Delete</button>
    </form> --}}
    </div>
    <div class="flex-row my-3 bg-white dark:bg-gray-800 p-4 rounded-lg">
        <div class="flex-row">
            <h1 class="mb-3 text-2xl dark:text-gray-200">{{ $post->title }}</h1>
        </div>
        <div>
            <img src="{{ isset($post->image) ? asset('storage/' . $post->image) : 'https://dummyimage.com/1000x400/d4d4d4/ffffff&text=Image+not+found' }}"
                class="h-auto w-full object-cover object-center" alt="{{ $post->category->slug }}">
            <!-- AGAR TAGNYA TIDAK DI ESCAPE PHP -->
            <article class="my-3 dark:text-gray-200">{!! $post->body !!}</article>
        </div>
    </div>



@endsection
