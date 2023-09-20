<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="/build/assets/favicon/favicon.ico">
        <title>@yield('title', config('app.name'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <h3 class="font-bold text-xl ">Register To the Workload App. </h3>
                <p class="mb-4"></p>
                <a href="/">
                    <img width="220" height="150" src="https://www.nup.ac.cy/wp-content/uploads/2021/07/Neapolis-Logo-EN.png" class="attachment-full size-full entered lazyloaded" alt="" decoding="async" data-lazy-src="https://www.nup.ac.cy/wp-content/uploads/2022/02/logo-home-1-1.svg" data-ll-status="loaded" naptha_cursor="region" style="
    display: block;
    margin-left: auto;
    margin-right: auto;
">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>



