{{-- @extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Post</h1>
    </div>

    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
    
    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->author->name }}</td>
                        <td>
                            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></a>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0 " onclick="return confirm('Are you sure delete this post?')"><span data-feather="x-circle"></button>
                            </form>
                    
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}

@extends('dashboard.layouts.main')
@section('content')

    <!-- btn create post -->
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
                        <span class="text-2xs md:text-xs uppercase font-bold">
                            {{ $post->publish_status ? 'Published' : 'Unpublished' }} </span>
                    </div>

                </div>

            </div>

            <div class="w-2/3 p-4 md:p-4">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $post->title }}</h1>
                <h6
                    class="inline-flex text-xs text-white bg-sky-500 rounded-md px-1 py-0.5 dark:bg-{{ $post->category->color }}-500">
                    {{ $post->category->name }}
                </h6>

                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ \Illuminate\Support\Str::limit(strip_tags($post->excerpt), 120) }}</p>

                <div class="flex justify-between flex-col sm:flex-row mt-3 item-center">
                    <h6 class="flex items-center text-xs font-bold text-gray-700 dark:text-gray-200 md:text-sm">By.
                        {{ $post->author->name }}&nbsp; &bull; &nbsp;
                        <span class="font-normal">{{ $post->created_at->diffForHumans() }} </span>
                    </h6>

                    <div class="flex justify-end mt-2 sm:mt-0">
                        <a href="/dashboard/all-posts/{{ $post->slug }}"
                            class="inline-flex p-1 text-xs font-bold text-white uppercase transition-colors duration-200 transform bg-blue-500 rounded dark:bg-blue-700 hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:bg-blue-700 dark:focus:bg-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        <a href="/dashboard/all-posts/{{ $post->slug }}/edit"
                            class="mx-1 inline-flex p-1 text-xs font-bold text-white uppercase transition-colors duration-200 transform bg-yellow-500 rounded dark:bg-yellow-700 hover:bg-yellow-700 dark:hover:bg-yellow-600 focus:outline-none focus:bg-yellow-700 dark:focus:bg-yellow-600">
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
    <div class="my-5">
        {{ $posts->links() }}
    </div>
    <!--/ post list -->
@endsection
