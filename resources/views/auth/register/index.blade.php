@extends('auth.layouts.main')
@section('title')
    Register
@endsection
@section('content')
    <div class="min-w-full">
        <div class="flex max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-4xl">
            <div class="hidden bg-cover lg:block lg:w-1/2"
                style="background-image:url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80')">
            </div>


            <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
                <form action="/register" method="POST">
                    @csrf
                    {{-- <img src="icon\logo%20RTIK%20Bangkalan.png" alt="" class="w-16 md:w-24 h-auto flex mx-auto"> --}}

                    <p class="text-xl text-center text-gray-600 dark:text-gray-200 uppercase">Register</p>

                    <div class="mt-4">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="fullName">Full
                            Name</label>
                        <input id="fullName"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            type="text" name="name" value="{{old('name')}}">

                        @error('name')
                            <div class="text-red-400 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="mt-4">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200"
                            for="username">Username</label>
                        <input id="username"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            type="text" name="username" value="{{old('username')}}">

                        @error('username')
                            <div class="text-red-400 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200"
                            for="emailAddress">Email
                            Address</label>
                        <input id="emailAddress"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            type="email" name="email" value="{{old('email')}}">
                        @error('email')
                            <div class="text-red-400 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <div class="flex justify-between">
                            <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200"
                                for="password">Password</label>
                        </div>

                        <input id="password"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            type="password" name="password">
                        @error('password')
                            <div class="text-red-400 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-8">
                        <button
                            class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-700 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                            type="submit">
                            Register
                        </button>
                    </div>
                    <div class="my-4">
                        <p class="mt-6 text-xs font-light text-gray-400"> Already have account? <a href="/login"
                                class="font-medium text-gray-700 dark:text-gray-200 hover:underline">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
