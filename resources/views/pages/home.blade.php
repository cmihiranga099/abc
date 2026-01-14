@extends('layouts.app')

@section('title', 'Home - EventPro')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-emerald-600 to-amber-500 text-white py-12 sm:py-16 md:py-32">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-4 sm:mb-6">Create Unforgettable Events</h1>
        <p class="text-base sm:text-lg md:text-xl mb-6 sm:mb-8 text-gray-100">From weddings to corporate gatherings, we make every moment special</p>
        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
            <a href="/packages" class="px-6 sm:px-8 py-2.5 sm:py-3 bg-white text-emerald-700 font-bold rounded-lg hover:shadow-lg transition text-sm sm:text-base">
                Explore Packages
            </a>
            <a href="/contact" class="px-6 sm:px-8 py-2.5 sm:py-3 bg-emerald-700 text-white font-bold rounded-lg hover:bg-emerald-800 transition text-sm sm:text-base">
                Get Started
            </a>
        </div>
    </div>
</section>

<!-- Featured Services -->
<section class="py-12 sm:py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center mb-8 sm:mb-12">Our Services</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
            <!-- Service 1 -->
            <div class="bg-white rounded-lg shadow-lg p-6 sm:p-8 hover:shadow-xl transition">
                <div class="text-3xl sm:text-4xl mb-4">💍</div>
                <h3 class="text-lg sm:text-xl font-bold mb-4">Wedding Planning</h3>
                <p class="text-gray-600 text-sm sm:text-base">Your dream wedding deserves professional planning. We handle every detail from venue selection to the final dance.</p>
            </div>

            <!-- Service 2 -->
            <div class="bg-white rounded-lg shadow-lg p-6 sm:p-8 hover:shadow-xl transition">
                <div class="text-3xl sm:text-4xl mb-4">🎯</div>
                <h3 class="text-lg sm:text-xl font-bold mb-4">Corporate Events</h3>
                <p class="text-gray-600 text-sm sm:text-base">Impress clients and employees with well-executed corporate events, conferences, and team-building activities.</p>
            </div>

            <!-- Service 3 -->
            <div class="bg-white rounded-lg shadow-lg p-6 sm:p-8 hover:shadow-xl transition">
                <div class="text-3xl sm:text-4xl mb-4">🎉</div>
                <h3 class="text-lg sm:text-xl font-bold mb-4">Party Planning</h3>
                <p class="text-gray-600 text-sm sm:text-base">Birthdays, anniversaries, and celebrations made memorable with creative themes and expert execution.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-12 sm:py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
            <div>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-6">Why Choose EventPro?</h2>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg class="h-5 sm:h-6 w-5 sm:w-6 text-emerald-700 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h3 class="font-bold text-sm sm:text-base">10+ Years Experience</h3>
                            <p class="text-gray-600 text-xs sm:text-sm">Proven track record in event management</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 sm:h-6 w-5 sm:w-6 text-emerald-700 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h3 class="font-bold text-sm sm:text-base">Professional Team</h3>
                            <p class="text-gray-600 text-xs sm:text-sm">Dedicated coordinators and planners</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 sm:h-6 w-5 sm:w-6 text-emerald-700 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h3 class="font-bold text-sm sm:text-base">Custom Solutions</h3>
                            <p class="text-gray-600 text-xs sm:text-sm">Tailored to your unique needs</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 sm:h-6 w-5 sm:w-6 text-emerald-700 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h3 class="font-bold text-sm sm:text-base">Competitive Pricing</h3>
                            <p class="text-gray-600 text-xs sm:text-sm">Quality service at affordable rates</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="bg-gradient-to-br from-emerald-400 to-amber-300 rounded-lg p-6 sm:p-8 text-white">
                <p class="text-2xl sm:text-3xl font-bold mb-4">1000+</p>
                <p class="text-base sm:text-lg mb-6">Successful Events Delivered</p>
                <p class="mb-6 sm:mb-8 text-sm sm:text-base">Join thousands of happy clients who trust us with their special moments.</p>
                <a href="/contact" class="inline-block px-6 sm:px-8 py-2.5 sm:py-3 bg-white text-emerald-700 font-bold rounded-lg hover:shadow-lg transition text-sm sm:text-base">
                    Start Planning
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-emerald-600 text-white py-12 sm:py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4 sm:mb-6">Ready to Plan Your Event?</h2>
        <p class="text-sm sm:text-base md:text-lg mb-6 sm:mb-8">Let's turn your vision into reality. Contact us today for a consultation.</p>
        <a href="/contact" class="inline-block px-6 sm:px-8 py-2.5 sm:py-3 bg-white text-emerald-700 font-bold rounded-lg hover:shadow-lg transition text-sm sm:text-base">
            Get In Touch
        </a>
    </div>
</section>
@endsection
