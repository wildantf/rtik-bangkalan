{{-- <nav class="shadow-sm">
    <div class="bg-gradient-to-br from-cyan-300 to-cyan-400 dark:from-gray-600 dark:to-gray-700">
        <div class="lg:mx-20 xl:mx-28">
            <div class="flex flex-col md:flex-row ">
                <div
                    class="flex items-center justify-between pl-4 py-4 md:py-0 border-b border-cyan-200 dark:border-gray-300 md:border-b-0">
                    <div class="inline-flex items-center">

                        <a href="/"><img src="/icon/logo-rtik.png" class="h-10 w-auto" alt=""></a>
                        <h1 class="md:hidden px-3 font-semibold text-white"> Relawan TIK Bangkalan</h1>
                    </div>
                    <div>
                        <button class="text-white focus:outline-none block md:hidden mr-2" id="toggle-mobile-menu">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="hidden md:flex md:justify-between w-full flex-col md:flex-row py-3 md:py-0"
                    id="navbar-menu">
                    <div class="flex flex-col md:flex-row font-semibold">
                        <a href="/"
                            class="block px-4 py-3 md:py-4 dark:border-gray-200 hover:text-white {{ Request::is('/') ? 'text-white md:border-b-2' : 'text-cyan-50' }} ">Home</a>
                        <a href="/posts"
                            class="block px-4 py-3 md:py-4 dark:border-gray-200 hover:text-white {{ Request::is('posts*') ? 'text-white md:border-b-2' : 'text-cyan-50' }}">Posts</a>
                        <a href="/about"
                            class="block px-4 py-3 md:py-4 dark:border-gray-200 hover:text-white {{ Request::is('about') ? 'text-white md:border-b-2' : 'text-cyan-50' }}">About</a>
                        <a href="/about"
                            class="block px-4 py-3 md:py-4 dark:border-gray-200 hover:text-white {{ Request::is('article') ? 'text-white md:border-b-2' : 'text-cyan-50' }}">Article</a>
                    </div>
                    <div class="flex flex-col md:flex-row">
                        @auth
                                                    <x-auth-dropdown user-name="{{ auth()->user()->name }}" />
                        @else
                                                    <a href="/login"
                                                        class="block px-4 py-3 md:py-4  hover:text-white {{ Request::is('login') ? 'text-white' : 'text-cyan-50' }}">Login</a>
                        @endauth

                    </div> 
                </div>
            </div>
        </div>
    </div>
</nav> --}}

<div class="bg-gradient-to-br from-cyan-300 to-cyan-400 dark:from-gray-600 dark:to-gray-700 shadow-md">
    <div class="lg:mx-20 xl:mx-28">
        <div x-data="{ open: false }"
            class="flex flex-col max-w-screen-xl px-2 py-3 mx-auto md:items-center md:justify-between md:flex-row ">
            <div class="flex flex-row items-center justify-between lg:justify-start">
                <a href="/">
                    <img src="/icon/logo-rtik.png" class="h-10 w-auto pl-1 lg:pl-0 lg:pr-2" alt="">
                    <div class="text-cyan-50 transition duration-500 ease-in-out transform tracking-relaxed lg:pr-4">
                        <h1
                            class="text-gray-700 tracking-wide font-sans text-center font-bold text-base dark:text-gray-100">
                            Relawan TIK</h1>
                        <h2 class="text-gray-600 dark:text-gray-200 font-mono text-center text-2xs tracking-wide">
                            BANGKALAN</h2>
                </a>
            </div>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outlin" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8 text-white dark:text-cyan-500">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd" style="display: none;"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}"
            class="flex-col items-center flex-grow pb-4 border-cyan-100  dark:border-cyan-500 md:pb-0 md:flex md:justify-end md:flex-row lg:border-l-2 lg:pl-2 flex">
            <a class="px-4 py-2 mt-2 text-sm text-white dark:text-gray-300 md:mt-0  {{ Request::is('/') ? 'text-cyan-500 dark:text-cyan-500' : 'dark:text-gray-300' }} hover:text-cyan-500 focus:outline-none focus:shadow-outline"
                href="/">Home</a>
            <a class="px-4 py-2 mt-2 text-sm text-white dark:text-gray-300 md:mt-0  {{ Request::is('posts') ? ' text-cyan-500 dark:text-cyan-500' : 'dark:text-gray-300' }} hover:text-cyan-500 focus:outline-none focus:shadow-outline"
                href="/posts">Posts</a>
            <a class="px-4 py-2 mt-2 text-sm text-white dark:text-gray-300 md:mt-0  {{ Request::is('article') ? ' text-cyan-500 dark:text-cyan-500' : 'dark:text-gray-300' }} hover:text-cyan-500 focus:outline-none focus:shadow-outline"
                href="/article">Article</a>
            <a class="px-4 py-2 mt-2 text-sm text-white dark:text-gray-300 md:mt-0  {{ Request::is('schedule') ? ' text-cyan-500 dark:text-cyan-500' : 'dark:text-gray-300' }} hover:text-cyan-500 focus:outline-none focus:shadow-outline"
                href="/schedule">Schedule</a>
            <a class="px-4 py-2 mt-2 text-sm text-white dark:text-gray-300 md:mt-0  {{ Request::is('download') ? ' text-cyan-500 dark:text-cyan-500' : 'dark:text-gray-300' }} hover:text-cyan-500 focus:outline-none focus:shadow-outline"
                href="#">Download</a>
            <a class="px-4 py-2 mt-2 text-sm text-white dark:text-gray-300 md:mt-0  {{ Request::is('about') ? ' text-cyan-500 dark:text-cyan-500' : 'dark:text-gray-300' }} hover:text-cyan-500 focus:outline-none focus:shadow-outline"
                href="/about">About</a>
            <a class="px-4 py-2 mt-2 text-sm text-white dark:text-gray-300 md:mt-0  {{ Request::is('team') ? ' text-cyan-500 dark:text-cyan-500' : 'dark:text-gray-300' }} hover:text-cyan-500 focus:outline-none focus:shadow-outline"
                href="/team">Team</a>


            <div class="inline-flex items-center gap-2 list-none lg:ml-auto">
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = ! open" @click.away="open = false"
                            class="flex flex-row items-center w-full py-2 text-sm text-left text-white dark:text-gray-300 md:w-auto md:inline md:mt-0 hover:text-cyan-500 focus:outline-none focus:shadow-outline">
                            <span>{{ auth()->user()->name }}</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                                class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform rotate-0 md:-mt-1">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90"
                            class="absolute right-0 z-30 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48"
                            style="display: none">
                            <div
                                class="px-2 py-2 text-cyan-300 dark:text-gray-200  bg-white rounded-md shadow dark:bg-gray-700">
                                <a href="#"
                                    class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <img src="{{ isset(auth()->user()->photo_profile) ? asset('storage/' . auth()->user()->photo_profile) : 'https://dummyimage.com/500x400' }}"
                                        alt="{{ auth()->user()->name }}"
                                        class="flex-shrink-0 object-cover mx-1 rounded-full w-9 h-9"
                                        alt="{{ auth()->user()->name }}">

                                    <div class="mx-1 truncate">
                                        <h1
                                            class="text-sm font-semibold text-gray-700 dark:text-gray-200 truncate capitalize">
                                            {{ auth()->user()->username }}</h1>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 truncate">
                                            {{ auth()->user()->email }}</p>
                                    </div>
                                </a>

                                <hr class="border-gray-200 dark:border-gray-500 ">

                                <a href="/profiles/{{ auth()->user()->username }}/edit"
                                    class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                    view profile
                                </a>

                                <a href="/dashboard"
                                    class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                    Dashboard
                                </a>
                                <a href="#"
                                    class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                    Settings
                                </a>
                                <hr class="border-gray-200 dark:border-gray-500 ">
                                <form action="/logout" method="POST">
                                    @csrf
                                    {{-- <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button> --}}
                                    <button href="#"
                                        class="w-full flex flex-start px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white"
                                        type="submit">
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="/login"
                        class="items-center block px-6 py-1.5 text-base font-medium text-center text-cyan-500 transition duration-500 ease-in-out transform border-2 border-white dark:border-cyan-500 hover:border-cyan-600 hover:shadow-md shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 hover:text-cyan-600">
                        Login </a>
                    <a href="/register"
                        class="items-center block px-6 py-2 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-cyan-500 rounded-xl hover:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-600 hover:shadow-md" >
                        Register </a>
                @endauth
            </div>

        </nav>
    </div>
</div>
</div>
<script>
    // FIXME: ganti pake alpine
    // $(document).ready(function() {
    //     $('#toggle-mobile-menu').on('click', function() {
    //         $('#navbar-menu').slideToggle(750);
    //     })
    //     if ($(window).width() >= 768) {
    //         $('#navbar-menu').css('display', 'inline-flex')
    //     }
    // });
</script>
