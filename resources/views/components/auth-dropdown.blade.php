<div class="inline-flex">
    <!-- Dropdown toggle button -->
    <button
        class="relative z-10 flex items-center flex-row-reverse md:flex-row text-sm text-blue-100 px-2 focus:text-white"
        id="toggle-dropdown">
        <span class="block capitalize">{{ $userName }}</span>
        <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                fill="currentColor"></path>
        </svg>
    </button>

    <!-- Dropdown menu -->
    <div class="hidden absolute md:right-28 z-20 py-2 mt-9 md:mt-14 w-60 overflow-hidden bg-white rounded-md shadow-xl dark:bg-gray-800"
        id="dropdown-menu">
        <a href="#"
            class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
            <img src="{{ isset(auth()->user()->photo_profile) ? asset('storage/' . auth()->user()->photo_profile) : 'https://dummyimage.com/500x400' }}"
                alt="{{ auth()->user()->name }}" class="flex-shrink-0 object-cover mx-1 rounded-full w-9 h-9"
                alt="{{ auth()->user()->name }}">

            <div class="mx-1 truncate">
                <h1 class="text-sm font-semibold text-gray-700 dark:text-gray-200 truncate capitalize">
                    {{ $userName }}</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 truncate">{{ auth()->user()->email }}</p>
            </div>
        </a>

        <hr class="border-gray-200 dark:border-gray-700 ">

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
        <hr class="border-gray-200 dark:border-gray-700 ">
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

<script>
    // const tgl_dropdown = document.querySelector('#toggle-dropdown');
    // const drop_menu = document.querySelector('#dropdown-menu');

    // tgl_dropdown.addEventListener("click", () => {
    //     drop_menu.classList.toggle('hidden')
    // })

    $(document).ready(function() {
        $('#toggle-dropdown').on('click', function() {
            $('#dropdown-menu').fadeToggle(750);
        });
    });
</script>
