<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-900 antialiased">
        <div class="min-h-screen flex items-center justify-center py-8 sm:py-12 px-3 sm:px-4 md:px-6 lg:px-8 relative overflow-hidden bg-gradient-to-br from-emerald-50 via-amber-50 to-slate-100">
            <!-- Animated background gradient orbs -->
            <div class="absolute top-10 left-10 w-60 sm:w-80 h-60 sm:h-80 bg-gradient-to-br from-emerald-200 to-amber-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-pulse"></div>
            <div class="absolute -bottom-20 -right-20 w-60 sm:w-80 h-60 sm:h-80 bg-gradient-to-bl from-sky-200 to-emerald-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/3 w-48 sm:w-72 h-48 sm:h-72 bg-gradient-to-br from-amber-200 to-emerald-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-pulse" style="animation-delay: 4s;"></div>

            <div class="relative max-w-md w-full z-10">
                <!-- Logo & Branding Section with Gradient -->
                <div class="text-center mb-6 sm:mb-10 bg-gradient-to-r from-emerald-100 to-amber-100 rounded-2xl sm:rounded-3xl p-6 sm:p-8 backdrop-blur-sm border border-emerald-200">
                    <a href="/" class="inline-block">
                        <div class="text-3xl sm:text-4xl md:text-5xl font-black bg-gradient-to-r from-emerald-700 via-amber-600 to-emerald-700 bg-clip-text text-transparent drop-shadow-lg">
                            EventPro
                        </div>
                    </a>
                    <p class="text-emerald-700 mt-2 sm:mt-3 text-base sm:text-lg font-semibold">Create Unforgettable Events</p>
                    <p class="text-slate-600 mt-0.5 sm:mt-1 text-xs sm:text-sm">Professional event planning made simple</p>
                </div>

                <!-- Main Card with Gradient Border -->
                <div class="relative bg-gradient-to-br from-white/95 to-slate-50/95 backdrop-blur-xl rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden border border-white/30">
                    <!-- Gradient border effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-500 via-amber-400 to-teal-500 opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <div class="relative bg-gradient-to-br from-white to-slate-50 rounded-2xl sm:rounded-3xl px-4 sm:px-8 py-8 sm:py-12">
                        {{ $slot }}
                    </div>
                </div>

                <!-- Footer Links -->
                <div class="text-center mt-6 sm:mt-8">
                    <p class="text-slate-600 text-xs sm:text-sm">
                        <a href="/" class="text-transparent bg-gradient-to-r from-emerald-600 to-amber-500 bg-clip-text font-bold hover:from-emerald-500 hover:to-amber-400 transition">← Back to Home</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
