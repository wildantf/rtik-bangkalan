<div id="menu"
    class="sticky top-0 z-10 flex-col hidden h-screen px-4 py-4 dark:bg-gray-900 bg-white shadow-inner w-54 xl:w-64 2xl:w-80 lg:px-6 xl:px-8 lg:py-6 lg:flex">

    <!-- menu and logo-->
    <div class="flex-1 py-2">
        <a href="/" class="hidden md:flex md:justify-center dark:bg-white rounded-lg">
            <img src="/icon/logo%20horizontal.png" class="h-14 w-auto" alt="logo rtik bkl">
        </a>
        <nav class="-mx-2 md:mt-4">
            <ul class="pt-2 space-y-1 text-base">
                <li>
                    <a href="/dashboard"
                        class="flex items-end px-4 py-2 space-x-2 font-bold text-cyan-800 dark:text-cyan-50 transition-colors duration-100  {{ Request::is('dashboard') ? 'bg-cyan-50 dark:bg-cyan-800' : 'text-opacity-70 hover:text-opacity-100' }} rounded-lg  hover:bg-cyan-50 dark:hover:bg-cyan-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z">
                            </path>
                        </svg>
                        <span class="flex-1">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/posts"
                        class="flex items-center px-4 py-2 space-x-2 font-bold text-cyan-800 dark:text-cyan-50 transition-colors duration-100  {{ Request::is('dashboard/posts*') ? 'bg-cyan-50 dark:bg-cyan-800' : 'text-opacity-70 hover:text-opacity-100' }} rounded-lg hover:bg-cyan-50 dark:hover:bg-cyan-800 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        <span class="flex-1">
                            My Posts
                        </span>
                        {{-- <span class="text-xs text-white bg-red-500 rounded-full px-1">
                            +99
                        </span> --}}
                    </a>
                </li>

                <div class="flex flex-wrap ml-5">
                    <h6 class="mt-5 uppercase text-gray-400 font-bold text-xs dark:text-white">Administrator</h6>
                </div>

                @hasanyrole('super-admin|admin')
                    @can('validation articles')
                        <li>
                            <a href="/dashboard/all-posts"
                                class="flex items-center px-4 py-2 space-x-2 font-bold text-cyan-800 dark:text-cyan-50 transition-colors duration-100  {{ Request::is('dashboard/all-posts') ? 'bg-cyan-50 dark:bg-cyan-800' : 'text-opacity-70 hover:text-opacity-100' }} rounded-lg hover:bg-cyan-50 dark:hover:bg-cyan-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                                </svg>
                                <span class="flex-1">
                                    All Posts
                                </span>
                            </a>
                        </li>
                    @endcan
                    @can('create category')
                        <li>
                            <a href="/dashboard/categories"
                                class="flex items-end px-4 py-2 space-x-2 font-bold text-cyan-800 dark:text-cyan-50 transition-colors duration-100 {{ Request::is('dashboard/categories') ? 'bg-cyan-50 dark:bg-cyan-800' : 'text-opacity-70 hover:text-opacity-100' }} rounded-lg hover:bg-cyan-50 text-opacity-70 hover:text-opacity-100 dark:hover:bg-cyan-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                <span class="flex-1">
                                    Categories
                                </span>
                            </a>
                        </li>
                    @endcan
                    {{-- <li>
                        <a href="#"
                            class="flex items-end px-4 py-2 space-x-2 font-bold text-cyan-800 dark:text-cyan-50 transition-colors duration-100 rounded-lg hover:bg-cyan-50 text-opacity-70 hover:text-opacity-100 dark:hover:bg-cyan-800">
                            <svg class="w-6 h-6" viewBox="0 0 20 20" fill="none" stroke="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1">
                                Settings
                            </span>
                        </a>
                    </li> --}}

                @endhasanyrole
            </ul>
        </nav>
    </div>
    <!--/ menu and logo -->

    <!-- profile link -->
    <div
        class="absolute left-0 flex-col items-center justify-center hidden w-full space-y-4 md:flex xl:w-auto xl:flex-row xl:justify-start xl:space-y-0 xl:space-x-2 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-opacity-60 xl:left-8 bottom-6">
        <img src="{{ isset(auth()->user()->photo_profile) ? asset('storage/' . auth()->user()->photo_profile) : 'https://dummyimage.com/500x400' }}"
            alt="{{ auth()->user()->name }}" class="rounded-full w-12 h-12">
        <div class="flex flex-col items-center text-sm xl:items-start">
            <span
                class="font-bold text-cyan-900 dark:text-cyan-50 capitalize">{{ \Illuminate\Support\Str::limit(auth()->user()->name, 17) }}</span>
            <a href="/profiles/{{ auth()->user()->username }}/edit"
                class="text-sm font-bold text-cyan-800 opacity-50 dark:text-cyan-50">View profile</a>
        </div>
    </div>
    <!--/ profile link -->

</div>
