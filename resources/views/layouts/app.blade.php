<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'EventPro'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            function toggleMobileMenu() {
                const menu = document.getElementById('mobile-menu');
                menu.classList.toggle('hidden');
            }
        </script>
    </head>
    <body class="font-sans antialiased text-slate-900 bg-gradient-to-br from-slate-50 via-emerald-50 to-amber-50">
        <!-- Navigation -->
        <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b border-emerald-100 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="/" class="text-lg sm:text-2xl font-bold bg-gradient-to-r from-emerald-600 to-amber-500 bg-clip-text text-transparent">
                            EventPro
                        </a>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex space-x-1">
                        <a href="/" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('home') ? 'bg-emerald-100 text-emerald-700' : 'text-slate-700 hover:bg-gray-100' }}">
                            Home
                        </a>
                        <a href="/about" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('about') ? 'bg-emerald-100 text-emerald-700' : 'text-slate-700 hover:bg-gray-100' }}">
                            About Us
                        </a>
                        <a href="/packages" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('packages') ? 'bg-emerald-100 text-emerald-700' : 'text-slate-700 hover:bg-gray-100' }}">
                            Packages
                        </a>
                        <a href="/reviews" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('reviews') ? 'bg-emerald-100 text-emerald-700' : 'text-slate-700 hover:bg-gray-100' }}">
                            Reviews
                        </a>
                        <a href="/contact" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('contact') ? 'bg-emerald-100 text-emerald-700' : 'text-slate-700 hover:bg-gray-100' }}">
                            Contact
                        </a>
                    </div>

                    <!-- Auth Links - Desktop -->
                    <div class="hidden md:flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('dashboard') }}" class="text-slate-700 hover:text-emerald-700 text-sm">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-slate-700 hover:text-emerald-700 text-sm">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-slate-700 hover:text-emerald-700 text-sm font-medium">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-3 py-2 bg-gradient-to-r from-emerald-600 to-amber-500 text-white rounded-lg hover:shadow-lg transition text-sm font-medium">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>

                    <!-- Mobile Menu Button -->
                    <button onclick="toggleMobileMenu()" class="md:hidden flex items-center text-slate-700 hover:text-emerald-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="hidden md:hidden pb-4 border-t">
                    <a href="/" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'bg-emerald-100 text-emerald-700' : 'text-slate-700 hover:bg-gray-100' }}">
                        Home
                    </a>
                    <a href="/about" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('about') ? 'bg-emerald-100 text-emerald-700' : 'text-slate-700 hover:bg-gray-100' }}">
                        About Us
                    </a>
                    <a href="/packages" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('packages') ? 'bg-emerald-100 text-emerald-700' : 'text-slate-700 hover:bg-gray-100' }}">
                        Packages
                    </a>
                    <a href="/reviews" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('reviews') ? 'bg-emerald-100 text-emerald-700' : 'text-slate-700 hover:bg-gray-100' }}">
                        Reviews
                    </a>
                    <a href="/contact" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('contact') ? 'bg-emerald-100 text-emerald-700' : 'text-slate-700 hover:bg-gray-100' }}">
                        Contact
                    </a>
                    
                    <!-- Mobile Auth Links -->
                    <div class="border-t pt-4 mt-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:bg-gray-100">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:bg-gray-100">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:bg-gray-100">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="block px-3 py-2 mt-2 bg-gradient-to-r from-emerald-600 to-amber-500 text-white rounded-lg text-base font-medium text-center">
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
        <footer class="bg-slate-900 text-slate-200 py-12 md:py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <h3 class="text-white font-bold text-lg mb-4">EventPro</h3>
                        <p class="text-sm">Creating memorable events that last a lifetime.</p>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-4">Quick Links</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="/" class="hover:text-amber-400 transition">Home</a></li>
                            <li><a href="/about" class="hover:text-amber-400 transition">About</a></li>
                            <li><a href="/packages" class="hover:text-amber-400 transition">Packages</a></li>
                            <li><a href="/contact" class="hover:text-amber-400 transition">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-4">Services</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('packages') }}" class="hover:text-amber-400 transition">Wedding Planning</a></li>
                            <li><a href="{{ route('packages') }}" class="hover:text-amber-400 transition">Corporate Events</a></li>
                            <li><a href="{{ route('packages') }}" class="hover:text-amber-400 transition">Birthday Parties</a></li>
                            <li><a href="{{ route('packages') }}" class="hover:text-amber-400 transition">Concerts</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-4">Contact</h4>
                        <p class="text-sm mb-2">Email: <a href="mailto:info@eventpro.com" class="hover:text-amber-400 transition">info@eventpro.com</a></p>
                        <p class="text-sm mb-2">Phone: <a href="tel:+15551234567" class="hover:text-amber-400 transition">+1 (555) 123-4567</a></p>
                        <p class="text-sm">123 Event Street, NY</p>
                    </div>
                </div>
                <div class="border-t border-gray-700 pt-8">
                    <p class="text-center text-sm">&copy; 2026 EventPro. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
