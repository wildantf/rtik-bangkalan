@extends('dashboard.layouts.main')
@section('content')
    <section class=" p-6 mx-auto bg-white rounded-md shadow-sm dark:bg-gray-800">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Create Post</h2>

        <form method="POST" action="/dashboard/posts" enctype="multipart/form-data">
            @csrf
            {{-- <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2"> --}}
            <div class="flex flex-wrap mt-4 items-center">
                <div class="w-full md:w-1/2 md:pr-2 md:py-4 py-2">
                    <label class="text-gray-700 dark:text-gray-200" for="title">Title</label>
                    <input id="title" name="title" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        value="{{ old('title') }}">
                    @error('title')
                        <div class="text-xs text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 md:pl-2 md:py-4 py-2">
                    <label class="text-gray-700 dark:text-gray-200" for="slug">Slug</label>
                    <input id="slug" name="slug" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 disabled:opacity-50 bg-gray-100"
                        value="{{ old('slug') }}" readonly>
                    @error('slug')
                        <div class="text-xs text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-full md:py-4 py-2">
                    <label class="text-gray-700 dark:text-gray-200" for="password">Category</label>
                    <select name="category_id"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        @foreach ($categories as $category)
                            @if (old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>


                <div class="w-full md:py-4 py-2">
                    <!-- TODO: Kasih drag and drop function-->
                    <div class="flex flex-col w-full h-full p-1 overflow-auto">
                        <div
                            class="img-preview flex flex-col items-center justify-center py-12 text-base text-gray-500 transition duration-500 ease-in-out transform bg-white border border-dashed rounded-lg focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 h-80">

                            <div class="bg-black bg-opacity-50 rounded-md">
                                <p class="text-xs leading-7 px-2 py-0.5 text-white">
                                    Drag and drop your image anywhere or
                                </p>
                            </div>
                            <label
                                class="w-auto px-2 py-1 my-2 mr-2 bg-white bg-opacity-40 text-gray-700 transition duration-500 ease-in-out transform border rounded-md hover:text-gray-600 text-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-gray-100 cursor-pointer">
                                <span id="text-upload">
                                    Upload Image
                                </span>
                                <input type="file" name="image" id="image" class="hidden" onchange="imgPreview()"
                                    accept="image/x-png,image/gif,image/jpeg">
                                @error('image')
                                    <div class="text-red text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </label>
                        </div>
                    </div>
                </div>

            </div>


            <div class="pt-6 mb-3">
                <label for="body" class="text-gray-700 dark:text-gray-200">Body</label>
                @error('body')
                    <p class="text-xs text-red-600">
                        {{ $message }}
                    </p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>


            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Create</button>
            </div>
        </form>
    </section>



    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function imgPreview() {
            const image = document.getElementById('image');
            const img_preview = document.querySelector('.img-preview');
            const text_upl = document.getElementById('text-upload')

            text_upl.textContent = "Change Image";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                img_preview.style.backgroundImage = 'url(' + oFREvent.target.result + ')';
                img_preview.style.backgroundSize = "fill";
                img_preview.style.backgroundRepeat = "no-repeat";
                img_preview.style.backgroundPosition = "center center";
                // console.log(oFREvent.target.result);
            };

        }
    </script>
@endsection
