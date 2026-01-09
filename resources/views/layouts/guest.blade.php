<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-purple-50 to-white">
        <div class="min-h-screen flex flex-col items-center justify-center py-12 px-4">
            <div class="max-w-md w-full">
                <div class="text-center mb-6">
                    <a href="/" class="inline-block">
                        <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">EventPro</div>
                    </a>
                    <p class="text-gray-600 mt-2">Create unforgettable events with ease</p>
                </div>

                <div class="bg-white shadow-lg rounded-xl px-8 py-10">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
