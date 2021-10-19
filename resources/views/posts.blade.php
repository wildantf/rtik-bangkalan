@extends('layouts.main')
@section('title')
    Posts
@endsection
@section('container')
    <section class="text-gray-600 body-font">
        <div class="border-b border-gray-300 ">
            <div class="flex md:justify-between my-3 items-center text-gray-800 dark:text-gray-200 font-medium">
                <!-- BREADCUMB -->
                <div class="items-center hidden md:inline-flex">
                    <h1 class="font-mono {{ $breadcrumb->isEmpty() ? 'font-bold' : '' }} ">All Post</h1>
                    @if (!$breadcrumb->isEmpty())
                        @foreach ($breadcrumb as $bc => $val)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 " viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <h1 class="font-mono @if ($loop->last) font-bold @endif">{{ $bc }}:'<span
                                    class="text-gray-400">{{ $val }}</span>'</h1>
                        @endforeach
                    @endif
                </div>
                <!--/ BREADCUMB -->

                <!-- Search Box -->
                <div class="relative w-full md:max-w-xs ">
                    <form action="/posts" method="GET">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif

                        @if (request('author'))
                            <input type="hidden" name="author" value="{{ request('author') }}">
                        @endif

                        <input type="text" name="search" placeholder="Search..."
                            class="w-full h-10 py-2 pl-4 text-sm rounded-md focus:outline-none border border-gray-300 dark:border-gray-500 bg-gray-50 text-gray-100 focus:ring dark:bg-gray-700">

                        <span class="absolute inset-y-0 right-0 flex items-center pr-2">
                            <button type="submit" title="search" class="p-1 focus:outline-none focus:ring">
                                <svg fill="currentColor" viewBox="0 0 512 512"
                                    class="w-4 h-4 text-gray-600 dark:text-gray-100">
                                    <path
                                        d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                                    </path>
                                </svg>
                            </button>
                        </span>
                    </form>
                </div>
                <!-- Search Box -->
            </div>
        </div>

        @if ($posts->count())
            <div
                class="mt-1 mx-auto flex flex-col bg-white dark:bg-gray-700 border dark:border-gray-700 shadow-lg rounded-lg">
                <div class="mx-auto">
                    <div class="rounded-t-lg h-96 overflow-hidden">
                        <div
                            class="m-2 absolute px-2 py-1 bg-opacity-50 rounded-md bg-{{ $posts[0]->category->color }}-500 tracking-widest title-font font-medium text-gray-200 mb-1">
                            <a href="/posts?category={{ $posts[0]->category->slug }}"
                                class="uppercase hover:text-white text-2xs md:text-xs text-uppercase">{{ $posts[0]->category->name }}</a>
                        </div>
                        <img src="{{ isset($posts[0]->image) ? asset('storage/' . $posts[0]->image) : 'https://dummyimage.com/1000x400/b5b5b5/ffffff&text=Image+not+found' }}"
                            class="object-cover object-center h-full w-full" alt="{{ $posts[0]->title }}">
                        {{-- <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->slug }}"
                            class="card-img-top" alt="{{ $posts[0]->category->slug }}"> --}}
                    </div>
                    <div class="flex flex-col md:flex-row m-5">
                        <div class="md:w-1/3 text-center md:pr-8 md:py-8">
                            <div
                                class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div class="flex flex-col items-center text-justify-center">
                                <h2 class="font-medium title-font mt-4 text-gray-900 text-lg capitalize"><a
                                        href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a>
                                </h2>
                                <span
                                    class="text-gray-400 text-xs tracking-widest uppercase">{{ $posts[0]->author->position->name }}</span>
                                <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                                <p class="text-base dark:text-gray-100">Raclette knausgaard hella meggs normcore
                                    williamsburg enamel pin
                                    sartorial
                                    venmo tbh hot chicken gentrify portland. (MOTTO)</p>
                            </div>
                        </div>
                        <div
                            class="md:w-2/3 md:pl-8 md:py-8 md:border-l border-gray-200 dark:border-gray-600 md:border-t-0 border-t mt-4 pt-4 md:mt-0 text-center md:text-justify">
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                {{ ucfirst(trans($posts[0]->title)) }}</h1>
                            <p class="leading-relaxed text-lg mb-4 md:pr-2 text-gray-800 dark:text-gray-200">
                                {{ strip_tags($posts[0]->body) }}</p>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-500 text-xs">{{ $posts[0]->created_at->diffForHumans() }}</span>
                                <a class="text-indigo-500 inline-flex items-center"
                                    href="/posts/{{ $posts[0]->slug }}">Read More
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>

                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="py-6">
                <div class="flex flex-wrap md:-m-2 xl:-m-3">
                    @foreach ($posts->skip(1) as $post)
                        <div class="py-2 md:px-2 xl:px-3 md:w-1/3">
                            <div
                                class=" h-full border shadow-lg dark:border-gray-700 rounded-lg overflow-hidden bg-white dark:bg-gray-700">
                                
                                    <a href="/posts?category={{ $post->category->slug }}"
                                        class="uppercase hover:text-white text-2xs md:text-xs text-uppercase m-2 absolute px-3 py-1 bg-opacity-70 rounded-md bg-{{ $post->category->color }}-500  tracking-widest title-font font-medium text-gray-200 mb-1 hover:bg-{{ $post->category->color }}-600 hover:shadow-lg py-2">{{ $post->category->name }}</a>


                                <img src="{{ isset($post->image) ? asset('storage/' . $post->image) : 'https://dummyimage.com/400x400/b5b5b5/ffffff&text=Image+not+found' }}"
                                    class="lg:h-48 md:h-36 w-full object-cover object-center"
                                    alt="{{ $post->category->slug }}">

                                {{-- @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}"
                                        class="lg:h-48 md:h-36 w-full object-cover object-center"
                                        alt="{{ $post->category->slug }}">
                                @else
                                    <img src="https://source.unsplash.com/500x400?{{ $post->category->slug }}"
                                        class="lg:h-48 md:h-36 w-full object-cover object-center"
                                        alt="{{ $post->category->slug }}">
                                @endif --}}
                                <div class="px-5 py-4 flex flex-col ">
                                    <div class="pb-2 border-b border-gray-100 dark:border-gray-600">
                                        <h1
                                            class="title-font text-lg font-medium text-gray-900 dark:text-white mb-3 truncate">
                                            {{ $post->title }}</h1>

                                        <!-- FIXME: ubah body menjadi excerpt atau hapus excerpt pada db-->
                                        <p class="leading-snug mb-3 text-justify md:h-40 xl:h-24 dark:text-gray-50">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 190) }}</p>
                                        <div class="flex justify-between items-center flex-wrap mt-4">
                                            <span class="text-xs text-gray-400">
                                                {{ $post->created_at->diffForHumans() }}</span>
                                            <a href="/posts/{{ $post->slug }}"
                                                class="text-blue-500 dark:text-blue-300 hover:text-blue-400 inline-flex items-center md:mb-2 lg:mb-0">Read
                                                More<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <div class="inline-flex items-center">
                                            <img alt="blog" src="https://dummyimage.com/103x103"
                                                class="w-10 h-10 rounded-full flex-shrink-0 object-cover object-center" />
                                            <span class="flex-grow flex flex-col pl-2">
                                                <span class="title-font font-medium text-gray-700 hover:text-cyan-500 dark:text-cyan-400 text-sm"><a
                                                        href="/posts?author={{ $post->author->username }}">
                                                        {{ $post->author->name }}
                                                    </a>
                                                </span>
                                                <span
                                                    class="text-gray-400 text-xs tracking-widest mt-0.2 uppercase">{{ $post->author->position->name }}</span>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        @else
            <div class="h-screen flex items-center justify-center">
                <p class="text-center fs-4 text-2xl dark:text-gray-50 font-semibold">No post found</p>
            </div>
        @endif

        <div class="mb-5">
            {{ $posts->links() }}
        </div>

    </section>
@endsection
