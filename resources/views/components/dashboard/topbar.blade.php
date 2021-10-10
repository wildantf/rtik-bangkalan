<div class="flex justify-between w-full mx-auto max-w-screen-2xl">
    <div class="hidden md:block">
        <h1 class="mb-1 text-2xl font-bold text-cyan-800 dark:text-cyan-50 @can('update', Model::class)
            
        @endcan capitalize">Welcome <span class=" font-normal">{{ auth()->user()->name }}</span></h1>
        <p class="hidden text-lg text-cyan-900 dark:text-cyan-50 lg:block"><span class="capitalize"> </span> overview</p>
    </div>
    <div class="flex justify-between flex-1 space-x-4 md:justify-end">
        <div class="relative w-full md:max-w-xs">
            <svg class="absolute w-5 h-5 text-cyan-900 top-3 left-3 opacity-70" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"></path>
            </svg>
            <input type="text"
                class="w-full h-10 pr-4 text-sm font-semibold text-cyan-900 placeholder-cyan-900 bg-white rounded-lg pl-9 placeholder-opacity-70 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-opacity-60"
                placeholder="Enter your search term...">
        </div>
        <div class="flex space-x-4">
            <button type="button"
                class="h-10 px-3 bg-white rounded-lg hover:bg-gray-50 focus:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-opacity-60">
                <svg class="w-6 h-6 text-cyan-900 opacity-80" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                    </path>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                </svg>
            </button>
            <button type="button"
                class="relative h-10 px-3 bg-white rounded-lg hover:bg-gray-50 focus:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-opacity-60">
                <svg class="w-6 h-6 text-cyan-900 opacity-80" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                    </path>
                </svg>
                <div class="absolute w-2 h-2 bg-red-500 rounded-full top-3 right-4 ring-2 ring-red-400 ring-opacity-60">
                    &nbsp;</div>
            </button>
        </div>
    </div>
</div>
