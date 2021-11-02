<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- tailwind css --}}
    @production
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endproduction
    <x-icon-tab />
    <script src="{{ asset('js/theme.js') }}"></script>

    {{-- JQUERY CDN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- alpine js --}}
    <script defer src="https://unpkg.com/alpinejs@3.4.2/dist/cdn.min.js"></script>

    <title>@yield('title') | Relawan TIK Bangkalan </title>



</head>

<body class="bg-cyan-50 dark:bg-gray-800">
    {{-- @include('partials.navbar') --}}

    {{-- NAVBAR --}}
    <x-navbar />

    <div class="mt-4">
        <div class="mx-4 md:mx-18 lg:mx-20 xl:mx-28">
            @yield('container')
        </div>
    </div>

    {{-- FOOTER --}}
    <x-footer />
</body>

</html>
