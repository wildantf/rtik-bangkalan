@extends('layouts.main')

@section('title')
    Team
@endsection

@section('container')
    <div class="px-4 py-12 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-16">
        <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
            <div>
                <p
                    class="dark:text-gray-200 inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
                    Dream Team
                </p>
            </div>
            <h2
                class="dark:text-black max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
                <span class="relative inline-block">
                    <svg viewBox="0 0 52 24" fill="currentColor"
                        class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                        <defs>
                            <pattern id="247432cb-6e6c-4bec-9766-564ed7c230dc" x="0" y="0" width=".135" height=".30">
                                <circle cx="1" cy="1" r=".7"></circle>
                            </pattern>
                        </defs>
                        <rect fill="url(#247432cb-6e6c-4bec-9766-564ed7c230dc)" width="52" height="24"></rect>
                    </svg>
                    <span class="relative">Welcome</span>
                </span>
                our talented team of professionals
            </h2>
            <p class="dark:text-gray-400 text-base text-gray-700 md:text-lg">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque rem aperiam, eaque
                ipsa quae.
            </p>
        </div>
        <div class="flex flex-wrap w-full justify-center">
            @foreach ($users as $user)
                <div class="flex flex-col items-center w-1/2 md:w-1/4 ">
                    <img class="object-cover w-20 h-20 mb-2 rounded-full shadow"
                        src="{{ isset($user->photo_profile) ? asset('storage/' . $user->photo_profile) : 'https://dummyimage.com/200x200' }}"
                        alt="Person" />
                    <div class="flex flex-col items-center">
                        <p class="dark:text-gray-200 text-sm md:text-lg font-bold">{{ $user->name }}</p>
                        <p class="text-xs md:text-sm text-gray-800 dark:text-gray-400">{{ $user->position->name }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
