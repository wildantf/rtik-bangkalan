@extends('auth.layouts.main')
@section('title')
    Email Verification
@endsection
@section('content')
    <div class="flex items-center flex-col w-full">
        <div class="mb-4">
            <x-pop-alert type='success' message="{{ session('Success') }}" />
        </div>
        <div
            class="w-full md:w-1/2 flex mx-auto items-center p-6 space-x-4 rounded-lg dark:bg-gray-900 dark:text-gray-200 shadow-md">
            <div class="flex items-center self-stretch justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-10 h-10">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>


            <div class="flex flex-col">
                @if (session('message'))
                    <div class="mb-4 font-medium text-sm text-green-500 dark:text-green-200">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @else
                    <div class="mb-4 font-medium text-sm text-gray-300">
                        Thanks for signing up! Before getting started, could you verify your email address by clicking on
                        the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                    </div>
                @endif
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
