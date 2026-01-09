<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'EventPro'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-white text-gray-900">
        <!-- Navigation -->
        <nav class="sticky top-0 z-50 bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="/" class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                            EventPro
                        </a>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex space-x-1">
                        <a href="/" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('home') ? 'bg-purple-100 text-purple-700' : 'text-gray-700 hover:bg-gray-100' }}">
                            Home
                        </a>
                        <a href="/about" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('about') ? 'bg-purple-100 text-purple-700' : 'text-gray-700 hover:bg-gray-100' }}">
                            About Us
                        </a>
                        <a href="/packages" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('packages') ? 'bg-purple-100 text-purple-700' : 'text-gray-700 hover:bg-gray-100' }}">
                            Packages
                        </a>
                        <a href="/reviews" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('reviews') ? 'bg-purple-100 text-purple-700' : 'text-gray-700 hover:bg-gray-100' }}">
                            Reviews
                        </a>
                        <a href="/contact" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('contact') ? 'bg-purple-100 text-purple-700' : 'text-gray-700 hover:bg-gray-100' }}">
                            Contact
                        </a>
                    </div>

                    <!-- Auth Links -->
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-purple-600 text-sm">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-gray-700 hover:text-purple-600 text-sm">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700 hover:text-purple-600 text-sm font-medium">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg hover:shadow-lg transition text-sm font-medium">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="min-h-screen">
            @yield('content')
            {{ $slot ?? '' }}
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-gray-300 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <h3 class="text-white font-bold text-lg mb-4">EventPro</h3>
                        <p class="text-sm">Creating memorable events that last a lifetime.</p>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-4">Quick Links</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="/" class="hover:text-purple-400">Home</a></li>
                            <li><a href="/about" class="hover:text-purple-400">About</a></li>
                            <li><a href="/packages" class="hover:text-purple-400">Packages</a></li>
                            <li><a href="/contact" class="hover:text-purple-400">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-4">Services</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="hover:text-purple-400">Wedding Planning</a></li>
                            <li><a href="#" class="hover:text-purple-400">Corporate Events</a></li>
                            <li><a href="#" class="hover:text-purple-400">Birthday Parties</a></li>
                            <li><a href="#" class="hover:text-purple-400">Concerts</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-4">Contact</h4>
                        <p class="text-sm mb-2">Email: info@eventpro.com</p>
                        <p class="text-sm mb-2">Phone: +1 (555) 123-4567</p>
                        <p class="text-sm">Address: 123 Event Street, City, State</p>
                    </div>
                </div>
                <div class="border-t border-gray-700 pt-8">
                    <p class="text-center text-sm">&copy; 2026 EventPro. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
