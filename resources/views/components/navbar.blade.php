<nav class="shadow-sm">
    <div class="bg-gradient-to-br from-cyan-300 to-cyan-400 dark:from-cyan-800 dark:to-cyan-900">
        <div class="lg:mx-20 xl:mx-28">
            <div class="flex flex-col md:flex-row ">
                <div class="flex items-center justify-between pl-4 py-4 md:py-0 border-b border-cyan-200 dark:border-gray-300 md:border-b-0">
                    <div class="inline-flex items-center">
                        {{-- <a href="#" class="text-white uppercase font-semibold">Brand</a> --}}
                        <a href="/"><img src="/icon/logo-rtik.png" class="h-10 w-auto" alt=""></a>
                        <h1 class="md:hidden px-3 font-semibold text-white"> Relawan TIK Bangkalan</h1>
                    </div>
                    {{-- toggle menu dropdown btn --}}
                    <div>
                        <button class="text-white focus:outline-none block md:hidden mr-2" id="toggle-mobile-menu">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                        </button>
                    </div>
                </div>
                <div class="hidden md:flex md:justify-between w-full flex-col md:flex-row py-3 md:py-0" id="navbar-menu">
                    <div class="flex flex-col md:flex-row">
                        {{-- <a class="nav-link {{Request::is('/') ? 'active' : '' }}" href="/">Home</a> --}}
                        <a href="/"
                            class="block px-4 py-3 md:py-4 hover:text-white {{ Request::is('/') ? 'text-white' : 'text-cyan-50' }} ">Home</a>
                        <a href="/posts"
                            class="block px-4 py-3 md:py-4 hover:text-white {{ Request::is('posts*') ? 'text-white' : 'text-cyan-50' }}">Article</a>
                        <a href="/about"
                            class="block px-4 py-3 md:py-4 hover:text-white {{ Request::is('about') ? 'text-white' : 'text-cyan-50' }}">About</a>
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
</nav>

<script>
    const tgl_mobile_menu= document.querySelector('#toggle-mobile-menu');
    const nav_menu= document.querySelector('#navbar-menu');
 
    tgl_mobile_menu.addEventListener("click",()=>{
        nav_menu.classList.toggle('hidden')
    })
 </script>