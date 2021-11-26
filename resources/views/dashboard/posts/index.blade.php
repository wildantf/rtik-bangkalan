{{-- @php
if (Request::is('dashboard/all-posts')) {
    $url = 'all-posts';
} else {
    $url = 'posts';
}
@endphp --}}

@section('csrf_token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@extends('dashboard.layouts.main')
@section('content')

    @if (session()->has('success'))
        <x-alert type="success"
            message="<span class='font-bold text-gray-200'>{{ session('success')[0] }}</span>{{ session('success')[1] }}" />
    @endif


    <!-- TODO: Tambahkan filter search dan padding menggunakan jquery -->

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

                <div class="absolute inline-flex p-2 w-1/3">
                    @if ($post->created_at->diffInHours(Carbon\Carbon::now(), false) < 24)
                        <div
                            class=" px-1 py-0.5 bg-opacity-90 rounded-md bg-yellow-500 tracking-widest title-font font-medium text-white mr-1">
                            <span class="text-2xs md:text-xs uppercase font-bold">NEW</span>
                        </div>
                    @endif

                    {{-- icon svg publish --}}
                    @php
                        $publish = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>';
                        $unpublish = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>';
                    @endphp

                    @can('validation articles')
                        {{-- <form> --}}
                        <div class="btn-ups">
                            <input name="pub_status" type="hidden" value="{{ $post->publish_status }}">
                            <input name="slug" type="hidden" value="{{ $post->slug }}">
                            <button
                                class="pub-stat px-1 h-full bg-opacity-90 rounded-md {{ $post->publish_status ? 'bg-green-500 hover:bg-green-600' : 'bg-red-500 hover:bg-red-600' }} tracking-widest title-font font-medium text-white">
                                <span class="has-tooltip">
                                    <span>
                                        {!! $post->publish_status ? $publish : $unpublish !!}
                                    </span>
                                    <span class="tooltip rounded text-xs shadow-lg px-2 py-1 bg-gray-800 text-gray-100">
                                        {{ $post->publish_status ? 'Click to unpublish' : 'Click to publish' }}
                                    </span>
                                </span>
                            </button>
                        </div>

                        {{-- </form> --}}
                    @else
                        <div
                            class="pub-stat px-1 flex items-center bg-opacity-90 rounded-md {{ $post->publish_status ? 'bg-green-500' : 'bg-red-500' }} tracking-widest title-font font-medium text-white">
                            <span class="has-tooltip">
                                <span>
                                    {!! $post->publish_status ? $publish : $unpublish !!}
                                </span>
                                <span class="tooltip rounded text-xs shadow-lg px-2 py-1 bg-gray-800 text-gray-100">
                                    {{ $post->publish_status ? 'This post is publish' : 'This post is unpublish' }}
                                </span>
                            </span>
                        </div>
                    @endcan

                </div>

            </div>

            <div class="w-2/3 p-4 md:p-4">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $post->title }}</h1>

                @isset($post->category_id)
                    <h6
                        class="inline-flex text-xs text-white bg-sky-500 rounded-md px-1 py-0.5 bg-{{ $post->category->color }}-500">
                        {{ $post->category->name }}
                    </h6>
                @endisset

                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ \Illuminate\Support\Str::limit(strip_tags($post->excerpt), 120) }}</p>

                <div class="flex justify-between mt-3 item-center">
                    <div class="flex items-center text-xs font-bold text-gray-700 dark:text-gray-200 md:text-sm">
                        @if (Request::is('dashboard/all-posts'))
                            <h6 class=" ">By.
                                {{ $post->author->name }}&nbsp; &bull; &nbsp;
                            </h6>
                        @endif
                        <span class="font-normal">{{ $post->created_at->diffForHumans() }}</span>
                    </div>

                    <div>
                        <a href="{{ route('dashboard.posts.show', $post->slug) }}"
                            class="inline-flex p-1 text-xs font-bold text-white uppercase transition-colors duration-200 transform bg-blue-500 rounded dark:bg-blue-700 hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:bg-blue-700 dark:focus:bg-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        {{-- <a href="{{ Request::routeIs('dashboard.all-posts.index') ?? Request::routeIs('dashboard.posts.index') ? route('dashboard.all-posts.edit', $post->slug) : route('dashboard.posts.edit', $post->slug) }}" --}}
                        <a href=" {{ route('dashboard.posts.edit', $post->slug) }}"
                            class="inline-flex p-1 text-xs font-bold text-white uppercase transition-colors duration-200 transform bg-yellow-500 rounded dark:bg-yellow-700 hover:bg-yellow-700 dark:hover:bg-yellow-600 focus:outline-none focus:bg-yellow-700 dark:focus:bg-yellow-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </a>
                        <form action="{{ route('dashboard.posts.destroy', $post->slug) }}" method="POST"
                            class="inline-flex">
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

    <script>
        $(document).ready(function() {
            $('.btn-ups').on('click', function() {
                // console.log($('input[name="pub_status"]',$(this)).val());

                if ($('input[name="pub_status"]', $(this)).val() == 1) {
                    $('button', $(this)).removeClass('bg-green-500 hover:bg-green-600').addClass(
                        'bg-red-500 hover:bg-red-600');
                    $('input[name="pub_status"]', $(this)).val(0);
                    $('span.tooltip', $(this)).text('Click to publish');
                    $('.has-tooltip span:first-child', $(this)).html(
                        '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>'
                    );

                } else {
                    $('button', $(this)).removeClass('bg-red-500 hover:bg-red-600').addClass(
                        'bg-green-500 hover:bg-green-600');
                    $('input[name="pub_status"]', $(this)).val(1)
                    $('span.tooltip', $(this)).text('Click to unpublish');
                    $('.has-tooltip span:first-child', $(this)).html(
                        '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>'
                    );
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/dashboard/publish/' + $('input[name="slug"]', $(this)).val(),
                    method: "POST",
                    async: true,
                    data: {
                        '_method': 'PUT',
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'slug': $('input[name="slug"]', $(this)).val(),
                        'publish_status': $('input[name="pub_status"]', $(this)).val(),
                    },
                    success: function(data) {
                        console.log('Berhasil');
                    },
                    error: function(xhr, exception) {
                        var msg = "";
                        if (xhr.status === 0) {
                            msg = "Not connect.\n Verify Network." + xhr.responseText;
                        } else if (xhr.status == 404) {
                            msg = "Requested page not found. [404]" + xhr.responseText;
                        } else if (xhr.status == 500) {
                            msg = "Internal Server Error [500]." + xhr.responseText;
                        } else if (exception === "parsererror") {
                            msg = "Requested JSON parse failed.";
                        } else if (exception === "timeout") {
                            msg = "Time out error." + xhr.responseText;
                        } else if (exception === "abort") {
                            msg = "Ajax request aborted.";
                        } else {
                            msg = "Error:" + xhr.status + " " + xhr.responseText;
                        };

                    },
                });

            });
        });
    </script>

@endsection
