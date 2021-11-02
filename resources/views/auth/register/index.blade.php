@extends('auth.layouts.main')
@section('title')
    Register
@endsection
@section('content')
    <div class="min-w-full">
        <div class="flex max-w-sm mx-auto overflow-hidden bg-white rounded-xl shadow-lg dark:bg-gray-800 lg:max-w-4xl">
            <div class="hidden bg-cover lg:block lg:w-1/2"
                style="background-image:url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80')">
            </div>


            <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
                <form action="{{ route('register.auth') }}" method="POST">
                    @csrf
                    {{-- <img src="icon\logo%20RTIK%20Bangkalan.png" alt="" class="w-16 md:w-24 h-auto flex mx-auto"> --}}

                    <p class="text-xl text-center text-gray-600 dark:text-gray-300 uppercase font-bold font-sans">Register
                    </p>

                    <div class="flex flex-col lg:flex-row mt-8">
                        <div class="flex flex-col lg:mr-1">
                            <label class="block mb-1 tracking-wide text-sm text-gray-600 dark:text-gray-200"
                                for="fullName">Full
                                Name</label>
                            <input id="fullName"
                                class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                type="text" name="name" value="{{ old('name') }}">

                            @error('name')
                                <div class="text-red-400 text-xs">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mt-4 lg:mt-0 flex flex-col lg:ml-1">
                            <label class="block mb-1 tracking-wide text-sm text-gray-600 dark:text-gray-200"
                                for="username">Username</label>
                            <input id="username"
                                class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                type="text" name="username" value="{{ old('username') }}">

                            @error('username')
                                <div class="text-red-400 text-xs">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>



                    <div class="mt-4">
                        <label class="block mb-1 tracking-wide text-sm text-gray-600 dark:text-gray-200" for="email">Email
                        </label>
                        <input id="email"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            type="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-red-400 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="flex flex-col lg:flex-row mt-4">
                        <div class="flex flex-col lg:mr-1">
                            <label class="block mb-1 tracking-wide text-sm text-gray-600 dark:text-gray-200"
                                for="password ">Password</label>
                            <input id="password"
                                class="w-full py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                type="password" name="password">
                            @error('password')
                                <div class="text-red-400 text-xs">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-4 lg:mt-0 flex flex-col lg:ml-1">
                            <label class="block mb-1 tracking-wide text-sm text-gray-600 dark:text-gray-200"
                                for="password-confirmation">Confirm password</label>
                            <input id="password-confirmation"
                                class=" w-full  py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                type="password" name="password_confirmation">
                            @error('password_confirmation')
                                <div class="text-red-400 text-xs">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center">
                            <input id="show-password" name="show-password" type="checkbox" placeholder="Your password"
                                class="form-checkbox h-4 w-4 focus:ring  focus:outline-none rounded-md text-blue-600 mr-1 cursor-pointer">
                            <label for="show-password"
                                class="cursor-pointer block ml-2 text-sm text-gray-800 dark:text-gray-200"> Show password
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-8">
                        <p class="flex w-1/2 text-xs font-light text-gray-400"> Already have account? <a href="{{ route('login') }}"
                                class="font-bold text-gray-700 dark:text-gray-200 hover:underline">&nbsp;Login</a></p>
                        <button
                            class=" w-1/3 px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-cyan-700 rounded-lg hover:bg-cyan-600 focus:outline-none focus:bg-cyan-600"
                            type="submit">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @production
        <script src="{{ secure_asset('js/script.js') }}"> </script>
    @else
        <script src="{{ asset('js/script.js') }}"> </script>
    @endproduction
@endsection
