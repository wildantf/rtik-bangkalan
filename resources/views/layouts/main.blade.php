<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- tailwind css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    {{-- <link href="/css/style.css" rel="stylesheet"> --}}


    <title>@yield('title') | Relawan TIK Bangkalan </title>

    {{-- <style>
        .scroll-hidden::-webkit-scrollbar {
           width: 0px;
            background: transparent; /* make scrollbar transparent */
 
        }
        </style> --}}
</head>

<body class="bg-cyan-50 dark:bg-cyan-700" >
    {{-- @include('partials.navbar') --}}

    {{-- NAVBAR --}}
    <x-navbar/>

    <div class="mt-4">
        <div class="mx-4 md:mx-18 lg:mx-20 xl:mx-28">
            @yield('container')
        </div>
    </div>

    {{-- FOOTER --}}
    <x-footer/>
</body>

</html>