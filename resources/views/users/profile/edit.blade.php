@extends('dashboard.layouts.main')
@section('content')
    <section class="p-6 mx-auto w-2/3 bg-white rounded-md shadow-sm dark:bg-gray-800">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit Profile</h2>

        <form method="POST" action="/profiles/{{ $user->username }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            {{-- <div class="w-full md:py-4 py-2">  
                <!-- TODO: Kasih drag and drop function-->
                <div class="flex flex-col w-full h-full p-1 overflow-auto">
                    <div class="img-preview flex flex-col items-center justify-center py-12 text-base text-gray-500 transition duration-500 ease-in-out transform bg-white border border-dashed rounded-lg focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 h-80"
                        style="background-image: url('{{ isset($user->photo_profile) ? asset('storage/' . $user->photo_profile) : '' }}'); background-size:fill; background-repeat: norepeat;background-position:center center;">

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
            </div> --}}
            <div class="relative">
                <img alt="profil" src="{{ isset($user->photo_profile)?asset('storage/' . $user->photo_profile) :'https://dummyimage.com/300x400'}}"
                    class="img-preview mx-auto object-cover rounded-full h-52 w-52" />
                <label
                    class="absolute w-10 h-10 left-1/2 -bottom-4 transform -translate-x-1/2  bg-blue-500 rounded-full flex items-center cursor-pointer hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto dark:text-gray-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    <input type="hidden" value="{{ $user->photo_profile }}" name="oldImage">
                    <input type="file" name="image" id="image" class="hidden"
                        accept="image/x-png,image/gif,image/jpeg" onchange="imgPreview()">
                    @error('image')
                        <div class="text-red text-xs">
                            {{ $message }}
                        </div>
                    @enderror

                </label>
            </div>


            <div class="flex flex-wrap mt-4 items-center">
                <div class="w-full md:w-1/2 md:pr-2 md:py-4 py-2">
                    <label class="text-gray-700 dark:text-gray-200" for="name">Name</label>
                    <input id="name" name="name" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        value="{{ $user->name ?? old('name') }}">
                    @error('name')
                        <div class="text-xs text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 md:pr-2 md:py-4 py-2">
                    <label class="text-gray-700 dark:text-gray-200" for="name">Motto</label>
                    <input id="motto" name="motto" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        value="{{ $user->motto ?? old('motto') }}">
                    @error('motto')
                        <div class="text-xs text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 md:pl-2 md:py-4 py-2">
                    <label class="text-gray-700 dark:text-gray-200" for="slug">Facebook</label>
                    <input id="facebook" name="facebook" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        value="{{ $user->facebook_url?? old('facebook') }}">
                    @error('facebook')
                        <div class="text-xs text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 md:pl-2 md:py-4 py-2">
                    <label class="text-gray-700 dark:text-gray-200" for="slug">Twitter</label>
                    <input id="twitter" name="twitter" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        value="{{ $user->twitter_url ?? old('twitter') }}">
                    @error('twitter')
                        <div class="text-xs text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 md:pl-2 md:py-4 py-2">
                    <label class="text-gray-700 dark:text-gray-200" for="slug">Github</label>
                    <input id="github" name="github" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        value="{{ $user->github_url ?? old('github') }}">
                    @error('github')
                        <div class="text-xs text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Update</button>
            </div>
        </form>


    </section>
    <script>
         function imgPreview() {
            const image = document.getElementById('image');
            const img_preview = document.querySelector('.img-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                img_preview.src = oFREvent.target.result ;
                // console.log(oFREvent.target.result);
            };

        }
    </script>
@endsection
