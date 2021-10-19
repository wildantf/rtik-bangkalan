<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- tailwind css --}}
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <x-icon-tab/>

    {{-- JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>@yield('title') | Relawan TIK Bangkalan</title>

</head>

<body
    class="flex items-center bg-gradient-to-br min-h-screen from-cyan-400 to-cyan-300 dark:from-gray-600 dark:to-cyan-800 ">

    @yield('content')

</body>

</html>
