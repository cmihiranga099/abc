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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex items-center justify-center py-8 sm:py-12 px-3 sm:px-4 md:px-6 lg:px-8 relative overflow-hidden bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
            <!-- Animated background gradient orbs -->
            <div class="absolute top-10 left-10 w-60 sm:w-80 h-60 sm:h-80 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
            <div class="absolute -bottom-20 -right-20 w-60 sm:w-80 h-60 sm:h-80 bg-gradient-to-bl from-cyan-500 to-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/3 w-48 sm:w-72 h-48 sm:h-72 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse" style="animation-delay: 4s;"></div>

            <div class="relative max-w-md w-full z-10">
                <!-- Logo & Branding Section with Gradient -->
                <div class="text-center mb-6 sm:mb-10 bg-gradient-to-r from-purple-600/10 to-pink-600/10 rounded-2xl sm:rounded-3xl p-6 sm:p-8 backdrop-blur-sm border border-purple-400/20">
                    <a href="/" class="inline-block">
                        <div class="text-3xl sm:text-4xl md:text-5xl font-black bg-gradient-to-r from-purple-400 via-pink-400 to-purple-400 bg-clip-text text-transparent drop-shadow-lg">
                            EventPro
                        </div>
                    </a>
                    <p class="text-purple-200 mt-2 sm:mt-3 text-base sm:text-lg font-semibold">Create Unforgettable Events</p>
                    <p class="text-cyan-300/80 mt-0.5 sm:mt-1 text-xs sm:text-sm">Professional event planning made simple</p>
                </div>

                <!-- Main Card with Gradient Border -->
                <div class="relative bg-gradient-to-br from-white/95 to-slate-50/95 backdrop-blur-xl rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden border border-white/30">
                    <!-- Gradient border effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-600 via-pink-600 to-cyan-600 opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <div class="relative bg-gradient-to-br from-white to-slate-50 rounded-2xl sm:rounded-3xl px-4 sm:px-8 py-8 sm:py-12">
                        {{ $slot }}
                    </div>
                </div>

                <!-- Footer Links -->
                <div class="text-center mt-6 sm:mt-8">
                    <p class="text-slate-300 text-xs sm:text-sm">
                        <a href="/" class="text-transparent bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text font-bold hover:from-purple-300 hover:to-pink-300 transition">← Back to Home</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
