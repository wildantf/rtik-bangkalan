@extends('dashboard.layouts.main')
@section('content')
    {{-- <!-- cards row -->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3 2xl:gap-8">

        <!-- monthly target -->
        <div class="col-span-1 px-4 py-4 bg-white rounded-md lg:px-8 lg:py-6">
            <h2 class="mb-4 text-xl font-bold text-cyan-900 lg:mb-6">Monthly target</h2>
            <div class="flex items-end mb-4 space-x-4 lg:mb-6">
                <div class="flex items-center justify-center w-12 h-12 bg-cyan-100 rounded-md">
                    <svg class="w-6 h-6 text-cyan-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.736 6.979C9.208 6.193 9.696 6 10 6c.304 0 .792.193 1.264.979a1 1 0 001.715-1.029C12.279 4.784 11.232 4 10 4s-2.279.784-2.979 1.95c-.285.475-.507 1-.67 1.55H6a1 1 0 000 2h.013a9.358 9.358 0 000 1H6a1 1 0 100 2h.351c.163.55.385 1.075.67 1.55C7.721 15.216 8.768 16 10 16s2.279-.784 2.979-1.95a1 1 0 10-1.715-1.029c-.472.786-.96.979-1.264.979-.304 0-.792-.193-1.264-.979a4.265 4.265 0 01-.264-.521H10a1 1 0 100-2H8.017a7.36 7.36 0 010-1H10a1 1 0 100-2H8.472c.08-.185.167-.36.264-.521z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span class="mb-2 text-2xl text-cyan-900">&euro;21.291,09</span>
                <span class="hidden mb-2 text-cyan-900 whitespace-pre opacity-70 xl:inline-block">/
                    &euro;40.000</span>
            </div>
            <div class="overflow-hidden rounded-full bg-green-50 h-7">
                <div style="width:65%;"
                    class="flex items-center justify-center text-center bg-green-400 rounded-full h-7 text-green-50">
                    65%
                </div>
            </div>
        </div>
        <!--/ monthly target -->

        <!-- customers -->
        <div class="col-span-1 px-4 py-4 bg-white rounded-md lg:px-8 lg:py-6">
            <h2 class="mb-4 text-xl font-bold text-cyan-900 lg:mb-6">Customers</h2>
            <div class="flex items-end mb-4 space-x-4 lg:mb-6">
                <div class="flex items-center justify-center w-12 h-12 bg-cyan-100 rounded-md">
                    <svg class="w-6 h-6 text-cyan-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                        </path>
                    </svg>
                </div>
                <span class="mb-2 text-2xl">491</span>
                <span class="px-3 mb-2 text-base text-green-500 bg-green-100 rounded-full border-full">&#8605;
                    32</span>
            </div>
            <p>Customers this month</p>
        </div>
        <!--/ customers -->

        <!-- sales -->
        <div class="col-span-1 px-4 py-4 bg-white rounded-md lg:px-8 lg:py-6">
            <h2 class="mb-4 text-xl font-bold text-cyan-900 lg:mb-6">Sales</h2>
            <div class="flex items-end mb-4 space-x-4 lg:mb-6">
                <div class="flex items-center justify-center w-12 h-12 bg-cyan-100 rounded-md">
                    <svg class="w-6 h-6 text-cyan-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
                        </path>
                    </svg>
                </div>
                <span class="mb-2 text-2xl">230</span>
                <span class="px-3 mb-2 text-base text-red-500 bg-red-100 rounded-full border-full">
                    <span class="inline-block transform rotate-180">
                        &#8604;
                    </span>
                    12
                </span>
            </div>
            <p>Sales this month</p>
        </div>
        <!--/ sales -->

    </div>
    <!--/ cards row --> --}}

    <!-- quick actions -->
    <div
        class="flex flex-col justify-center lg:justify-between px-4 py-4 mt-8 space-y-4 bg-white dark:bg-gray-800 rounded-lg lg:px-8 lg:py-6 lg:flex-row lg:space-y-0 lg:space-x-12">
        <div>
            <h2 class="mb-2 text-xl font-bold text-cyan-800 dark:text-blue-200">Quick actions</h2>
            <p class="text-cyan-900 dark:text-gray-200 opacity-70">It's most used actions</p>
        </div>
        <nav class="space-y-2 md:flex md:space-x-4 md:space-y-0">
            @can('delete user')
                <a href="#"
                    class="inline-flex flex-col items-center justify-center w-32 px-3 py-3 border border-cyan-300 dark:border-gray-600 rounded-lg hover:bg-cyan-100 dark:hover:bg-gray-700">
                    <svg class="w-8 h-8 text-cyan-900 dark:text-gray-200" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z" />
                    </svg>
                    <span class="text-cyan-900 dark:text-gray-200 opacity-70">
                        Delete User
                    </span>
                </a>
            @endcan

            <a href="{{ route('dashboard.posts.create') }}"
                class="inline-flex flex-col items-center justify-center w-32 px-3 py-3 border border-cyan-300 dark:border-gray-600 rounded-lg hover:bg-cyan-100 dark:hover:bg-gray-700">
                <svg class="w-8 h-8 text-cyan-900 dark:text-gray-200" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="text-cyan-900 dark:text-gray-200 opacity-70">
                    Create Post
                </span>
            </a>

            <a href="{{ route('profiles.edit', auth()->user()->username) }}"
                class="inline-flex flex-col items-center justify-center w-32 px-3 py-3 border border-cyan-300 dark:border-gray-600 rounded-lg hover:bg-cyan-100 dark:hover:bg-gray-700">
                <svg class="w-8 h-8 text-cyan-900 dark:text-gray-200" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                    </path>
                </svg>
                <span class="text-cyan-900 dark:text-gray-200 opacity-70">
                    Edit Profile
                </span>
            </a>

            <a href="{{ route('dashboard.all-posts.index') }}"
                class="inline-flex flex-col items-center justify-center w-32 px-3 py-3 border border-cyan-300 dark:border-gray-600 rounded-lg hover:bg-cyan-100 dark:hover:bg-gray-700">
                <svg class="w-8 h-8 text-cyan-900 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd"
                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                        clip-rule="evenodd" />
                </svg>
                <span class="text-cyan-900 dark:text-gray-200 opacity-70">
                    Edit Post
                </span>
            </a>
        </nav>
    </div>
    <!--/ quick actions -->

    <!-- User -->
    <div class="px-4 py-4 mt-8 bg-white dark:bg-gray-800 rounded-md lg:px-8 lg:py-6">
        <h2 class="mb-4 text-xl font-bold text-cyan-900 lg:mb-6 dark:text-gray-200">User</h2>
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full overflow-hidden align-middle">
                <table class="min-w-full">
                    <thead class="text-center bg-cyan-200 dark:bg-cyan-800 dark:text-gray-200">
                        <tr>
                            <th class="px-3 py-2">User</th>
                            <th class="px-3 py-2">Contact</th>
                            <th class="px-3 py-2">Join Date</th>
                            <th class="px-3 py-2">Role</th>
                        </tr>
                    </thead>
                    <tbody
                        class="text-cyan-900 dark:text-gray-50 divide-y divide-cyan-100 text-opacity-80 whitespace-nowrap">
                        @foreach ($users as $user)

                            <tr>
                                <td class="px-3 py-3">{{ $user->name }}</td>
                                <td class="px-3 py-3">{{ $user->email }}</td>
                                <td class="px-3 py-3 text-center">{{ $user->created_at->format('d/M/Y') }}</td>
                                <td class="px-3 py-3 text-center">
                                    <span
                                        class="inline-block px-3 py-1 text-xs text-center text-green-500 uppercase bg-green-100 rounded-full">{{ $user->roles->pluck('name')[0] }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <a href="#" class="inline-block mt-5 font-bold text-cyan-600 hover:underline">View all
            users</a> --}}
    </div>
    <!--/ recent orders -->


@endsection
