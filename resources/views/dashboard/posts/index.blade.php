@extends('dashboard.layouts.main')
@section('content')

    @if (session()->has('success'))
       <x-pop-alert type="success" message="{{session('success')}}"/>
    @endif
    <!-- btn create post -->
    <a href="/dashboard/posts/create"
        class="py-2 px-4 inline-flex mb-4 items-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-md ">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                clip-rule="evenodd" />
        </svg>
        Create new post
    </a>

    <!-- TODO: Tambahkan filter dan padding menggunakan jquery -->

    <!--/ btn create post -->

    {{-- @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif --}}

    <!-- post list -->
    @foreach ($posts as $post)
        <div class="flex mx-auto overflow-hidden bg-white rounded-md mt-2 shadow-md dark:bg-gray-800">
            <div class="w-1/3 bg-cover"
                style="background-image: url({{ isset($post->image) ? asset('storage/' . $post->image) : 'https://dummyimage.com/500x400' }});  background-position:center center; background-size;">

                <div class="absolute inline-flex m-2">
                    @if ($post->created_at->diffInHours(Carbon\Carbon::now(), false) < 24)
                        <div
                            class=" px-1 py-0.5 bg-opacity-90 rounded-md bg-yellow-500 tracking-widest title-font font-medium text-white mr-1">
                            <span class="text-2xs md:text-xs uppercase font-bold">NEW</span>
                        </div>
                    @endif

                    <div
                        class="px-1 py-0.5 bg-opacity-90 rounded-md {{ $post->publish_status ? 'bg-green-500' : 'bg-red-500' }} tracking-widest title-font font-medium text-white">
                        <span
                            class="text-2xs md:text-xs uppercase font-bold">{{ $post->publish_status ? 'Published' : 'Unpublished' }}</span>
                    </div>

                </div>

            </div>

            <div class="w-2/3 p-4 md:p-4">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $post->title }}</h1>
                <h6 class="inline-flex text-xs text-white bg-sky-500 rounded-md px-1 py-0.5"> {{ $post->category->name }}
                </h6>

                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ $post->excerpt }}</p>

                <div class="flex justify-between mt-3 item-center">
                    <span
                        class="flex items-center text-xs font-bold text-gray-700 dark:text-gray-200 md:text-sm">{{ $post->created_at->diffForHumans() }}</span>

                    <div>
                        <a href="/dashboard/posts/{{ $post->slug }}"
                            class="inline-flex p-1 text-xs font-bold text-white uppercase transition-colors duration-200 transform bg-blue-500 rounded dark:bg-blue-700 hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:bg-blue-700 dark:focus:bg-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        <a href="/dashboard/posts/{{ $post->slug }}/edit"
                            class="inline-flex p-1 text-xs font-bold text-white uppercase transition-colors duration-200 transform bg-yellow-500 rounded dark:bg-yellow-700 hover:bg-yellow-700 dark:hover:bg-yellow-600 focus:outline-none focus:bg-yellow-700 dark:focus:bg-yellow-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="inline-flex">
                            @method('delete')
                            @csrf
                            <button
                                class="p-1 text-xs font-bold text-white uppercase transition-colors duration-200 transform bg-red-500 rounded dark:bg-red-700 hover:bg-red-700 dark:hover:bg-red-600 focus:outline-none focus:bg-red-700 dark:focus:bg-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    <!--/ post list -->
@endsection
