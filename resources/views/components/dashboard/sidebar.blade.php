<div id="menu"
    class="sticky top-0 z-10 flex-col hidden h-screen px-4 py-4 dark:bg-gray-900 bg-white shadow-inner w-54 xl:w-64 2xl:w-80 lg:px-6 xl:px-8 lg:py-6 lg:flex">

    <!-- menu and logo-->
    <div class="flex-1 py-2">
        <div class="flex flex-col justify-between h-full">
            <nav class="-mx-2 lg:mt-2 font-semibold">
                <a href="{{ route('home') }}" class="hidden lg:flex lg:justify-center dark:bg-gray-200 rounded-lg">
                    <img src="/icon/logo%20horizontal.png" class="h-14 w-auto" alt="logo rtik bkl">
                </a>
                <ul class="pt-4 space-y-1 text-base">
                    <li>
                        <a href="{{ route('dashboard.') }}"
                            class="flex items-end px-4 py-2 space-x-2 text-cyan-800 dark:text-cyan-100 transition-colors duration-100  {{ Request::routeIs('dashboard.') ? 'bg-cyan-50 dark:bg-cyan-800' : 'text-opacity-70 hover:text-opacity-100' }} rounded-lg  hover:bg-cyan-50 dark:hover:bg-cyan-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                            </svg>
                            <span class="flex-1">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.posts.index') }}"
                            class="flex items-center px-4 py-2 space-x-2 text-cyan-800 dark:text-cyan-100 transition-colors duration-100  {{ Request::routeIs('dashboard.posts*') && !Request::routeIs('dashboard.posts.create') ? 'bg-cyan-50 dark:bg-cyan-800' : 'text-opacity-70 hover:text-opacity-100' }} rounded-lg hover:bg-cyan-50 dark:hover:bg-cyan-800 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="flex-1">
                                My Posts
                            </span>
                            {{-- <span class="text-xs text-white bg-red-500 rounded-full px-1">
                            +99
                        </span> --}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.posts.create') }}"
                            class="flex items-center px-4 py-2 space-x-2 text-cyan-800 dark:text-cyan-100 transition-colors duration-100  {{ Request::routeIs('dashboard.posts.create') ? 'bg-cyan-50 dark:bg-cyan-800' : 'text-opacity-70 hover:text-opacity-100' }} rounded-lg hover:bg-cyan-50 dark:hover:bg-cyan-800 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="flex-1">
                                Create Post
                            </span>
                            {{-- <span class="text-xs text-white bg-red-500 rounded-full px-1">
                            +99
                        </span> --}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profiles.edit' , auth()->user()->username) }}"
                            class="flex items-end px-4 py-2 space-x-2 text-cyan-800 dark:text-cyan-100 transition-colors duration-100 rounded-lg hover:bg-cyan-50 text-opacity-70 hover:text-opacity-100 dark:hover:bg-cyan-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                              </svg>
                            <span class="flex-1">
                                Settings
                            </span>
                        </a>
                    </li>

                    @hasanyrole('super-admin|admin')
                        <div class="flex flex-wrap ml-5">
                            <h6 class="mt-5 uppercase text-gray-400 text-xs dark:text-cyan-500 tracking-wider">Administrator</h6>
                        </div>

                        @can('validation articles')
                            <li>
                                <a href="{{ route('dashboard.all-posts.index') }}"
                                    class="flex items-center px-4 py-2 space-x-2 text-cyan-800 dark:text-cyan-100 transition-colors duration-100  {{ Request::routeIs('dashboard.all-posts*') ? 'bg-cyan-50 dark:bg-cyan-800' : 'text-opacity-70 hover:text-opacity-100' }} rounded-lg hover:bg-cyan-50 dark:hover:bg-cyan-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                                        <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                                    </svg>
                                    <span class="flex-1">
                                        All Posts
                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('create category')
                            <li>
                                <a href="{{ route('dashboard.categories.index') }}"
                                    class="flex items-end px-4 py-2 space-x-2 text-cyan-800 dark:text-cyan-100 transition-colors duration-100 {{ Request::routeIs('dashboard.categories*') ? 'bg-cyan-50 dark:bg-cyan-800' : 'text-opacity-70 hover:text-opacity-100' }} rounded-lg hover:bg-cyan-50 text-opacity-70 hover:text-opacity-100 dark:hover:bg-cyan-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                    </svg>
                                    <span class="flex-1">
                                        Categories
                                    </span>
                                </a>
                            </li>
                        @endcan


                    @endhasanyrole
                </ul>

            </nav>
            <div class="pt-2 space-y-1 text-base flex justify-center">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="flex items-center px-4 py-2 space-x-2 text-cyan-800 dark:text-cyan-100 transition-colors duration-100 rounded-lg hover:bg-cyan-50 text-opacity-70 hover:text-opacity-100 dark:hover:bg-cyan-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>
                            Logout
                        </span>
                    </button>
                </form>
            </div>
        </div>

    </div>
    <!--/ menu and logo -->

    <!-- profile link -->
    {{-- <div
        class="absolute left-0 flex-col items-center justify-center hidden w-full space-y-4 md:flex xl:w-auto xl:flex-row xl:justify-start xl:space-y-0 xl:space-x-2 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-opacity-60 xl:left-8 bottom-6">
        <img src="{{ isset(auth()->user()->photo_profile) ? asset('storage/' . auth()->user()->photo_profile) : 'https://dummyimage.com/500x400' }}"
            alt="{{ auth()->user()->name }}" class="rounded-full w-12 h-12">
        <div class="flex flex-col items-center text-sm xl:items-start">
            <span
                class= text-cyan-900 dark:text-cyan-100 capitalize">{{ \Illuminate\Support\Str::limit(auth()->user()->name, 17) }}</span>
            <a href="/profiles/{{ auth()->user()->username }}/edit"
                class="text-sm text-cyan-800 opacity-50 dark:text-cyan-100">View profile</a>
        </div>
        
    </div> --}}

    <!--/ profile link -->

</div>
