<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hoppin Deals') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-pink-100">
    <div class="min-h-screen flex flex-col pt-6 sm:pt-0 bg-pink-50">

        <!-- Navigation -->
        @include('layouts.admin-navigation')

        <!-- Page Content -->
        <div
            class="mx-8 mt-4 px-6 py-4 bg-white dark:bg-gray-800 shadow-lg rounded-lg border-2 border-pink-300 overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
