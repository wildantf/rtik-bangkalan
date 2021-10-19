@extends('layouts.main')
@section('title')
    Post
@endsection

@section('container')

    {{-- <article>
        <h1></h1>
        <p>By <a class="text-decoration-none" href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in
            <a class="text-decoration-none"
                href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
     
    </article>

    <a href="/posts"> Back </a> --}}

    <article class="px-4 py-20 mx-auto ">
        <div class="w-full mx-auto mb-12 text-left md:w-3/4">
            {{-- <img src="/brand/og.png" class="object-cover w-full h-64 bg-center rounded-lg" alt="Kutty" /> --}}
            @if ($post->image)
                {{-- <div style="max-height:350px; overflow:hidden;"> --}}
                <img src="{{ asset('storage/' . $post->image) }}" class="w-full mx-auto mb-12 text-left md:w-3/4"
                    alt="{{ $post->category->slug }}">
                {{-- </div> --}}
            @else
                {{-- <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->slug }}"
                                class="object-cover object-center h-full w-full" alt="{{ $posts[0]->category->slug }}"> --}}
                <img alt="content" class="w-full mx-auto mb-12 text-left" src="https://dummyimage.com/1200x500">
            @endif
            <p class="mt-6 mb-2 text-xs font-semibold tracking-wider uppercase text-primary">{{ $post->category->name }}
            </p>
            <h1 class="mb-3 text-3xl font-bold leading-tight text-gray-900 dark:text-black md:text-4xl capitalize" itemprop="headline"
                title="{{ $post->title }}">
                {{ $post->title }}
            </h1>
            <div class="flex mb-6 space-x-2">
                <a class="text-gray-900 dark:bg-gray-400 badge hover:bg-gray-200 rounded-xl px-2" href="#">CSS</a>
                <a class="text-gray-900 dark:bg-gray-400 badge hover:bg-gray-200 rounded-xl px-2" href="#">Tailwind</a>
                <a class="text-gray-900 dark:bg-gray-400 badge hover:bg-gray-200 rounded-xl px-2" href="#">Ajax</a>
            </div>
            <a class="flex items-center text-gray-700" href="#">
                <div class="avatar "><img src="{{isset($post->author->photo_profile) ? asset('storage/'. $post->author->photo_profile) : 'https://dummyimage.com/500x500'}}" alt="{{ $post->author->name }}"
                        class="object-fill h-10 w-10 rounded-full" /></div>
                <div class="ml-2">
                    <p class="text-sm font-semibold text-gray-800 dark:text-gray-300">{{ $post->author->name }}</p>
                    <p class="text-sm text-gray-500"> {{ $post->created_at->diffForHumans() }}</p>
                </div>
            </a>
        </div>

        <div class="w-full mx-auto pl-12 prose md:w-3/4 text-justify dark:text-gray-200">
            <!-- AGAR TAGNYA TIDAK DI ESCAPE PHP -->
            {!! $post->body !!}
        </div>
    </article>


@endsection
