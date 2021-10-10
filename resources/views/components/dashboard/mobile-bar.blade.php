<div class="flex items-center justify-between px-4 py-2 text-cyan-100 bg-cyan-900 dark:bg-gray-900 lg:hidden">
    <button id="menuToggle">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"></path>
        </svg>
    </button>

    <a href="/" class="block -mr-8 dark:bg-white rounded-lg">
        <img src="/icon/logo%20horizontal.png" class="h-14 w-auto" alt="logo rtik bkl">
    </a>

    <button
        class="flex flex-row items-center justify-center space-x-2 xl:justify-start focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-opacity-60">
    <span class="text-xs font-bold text-cyan-100 capitalize">{{\Illuminate\Support\Str::limit(auth()->user()->name,12)}} </span>
        <img src="{{ auth()->user()->image_profile ?? 'https://dummyimage.com/500x400' }}" alt="Abigail Wallace"
            class="w-10 h-10 rounded-full">
    </button>
</div>
