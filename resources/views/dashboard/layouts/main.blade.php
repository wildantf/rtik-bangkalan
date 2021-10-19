<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <x-icon-tab/>


    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    {{-- tailwind css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    {{-- JQUERY CDN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- ALpine --}}
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script> --}}

    <title>Dashboard | Relawan TIK Bangkalan</title>
</head>

<body class="font-sans">
    <div id="content">
        <div class="flex flex-col min-h-screen text-base subpixel-antialiased font-semibold text-cyan-900 lg:flex-row">
            <!-- mobile bar -->
            <x-dashboard.mobile-bar />
            <!--/ mobile bar-->

            <!--- sidebar -->
            <x-dashboard.sidebar />
            <!--/ sidebar -->

            <div class="flex flex-col flex-1 px-4 py-4 overflow-hidden dark:bg-gray-700 bg-cyan-400 lg:py-8 lg:px-6 xl:px-8">

                <!-- topbar -->
                <x-dashboard.topbar />
                <!--/ topbar -->

                <!-- main content -->
                <div class="flex-1 py-4 lg:py-10">
                    <div class="mx-auto max-w-screen-2xl">

                        @yield('content')

                    </div>
                </div>
                <!--/ main content -->
            </div>
        </div>


        <!-- JavaScript -->
        <script>
            // Very simple example for toggling mobile menu 

            const button = document.getElementById('menuToggle');
            const menu = document.getElementById('menu');
            const body = document.getElementsByTagName('body')

            button.onclick = function(event) {
                event.preventDefault();

                menu.classList.toggle('hidden')
                body[0].classList.toggle('overflow-hidden')

            }
        </script>
        <!--/ JavaScript -->

    </div>
    <script src="/js/app.js" defer></script>
</body>


</html>
