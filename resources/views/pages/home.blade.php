@extends('layouts.app')

@section('title', 'Home - EventPro')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-purple-600 to-pink-600 text-white py-20 md:py-32">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6">Create Unforgettable Events</h1>
        <p class="text-lg md:text-xl mb-8 text-gray-100">From weddings to corporate gatherings, we make every moment special</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/packages" class="px-8 py-3 bg-white text-purple-600 font-bold rounded-lg hover:shadow-lg transition">
                Explore Packages
            </a>
            <a href="/contact" class="px-8 py-3 bg-purple-700 text-white font-bold rounded-lg hover:bg-purple-800 transition">
                Get Started
            </a>
        </div>
    </div>
</section>

<!-- Featured Services -->
<section class="py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Our Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition">
                <div class="text-4xl mb-4">💍</div>
                <h3 class="text-xl font-bold mb-4">Wedding Planning</h3>
                <p class="text-gray-600">Your dream wedding deserves professional planning. We handle every detail from venue selection to the final dance.</p>
            </div>

            <!-- Service 2 -->
            <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition">
                <div class="text-4xl mb-4">🎯</div>
                <h3 class="text-xl font-bold mb-4">Corporate Events</h3>
                <p class="text-gray-600">Impress clients and employees with well-executed corporate events, conferences, and team-building activities.</p>
            </div>

            <!-- Service 3 -->
            <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition">
                <div class="text-4xl mb-4">🎉</div>
                <h3 class="text-xl font-bold mb-4">Party Planning</h3>
                <p class="text-gray-600">Birthdays, anniversaries, and celebrations made memorable with creative themes and expert execution.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Why Choose EventPro?</h2>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-purple-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h3 class="font-bold">10+ Years Experience</h3>
                            <p class="text-gray-600">Proven track record in event management</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-purple-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h3 class="font-bold">Professional Team</h3>
                            <p class="text-gray-600">Dedicated coordinators and planners</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-purple-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h3 class="font-bold">Custom Solutions</h3>
                            <p class="text-gray-600">Tailored to your unique needs</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-purple-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h3 class="font-bold">Competitive Pricing</h3>
                            <p class="text-gray-600">Quality service at affordable rates</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="bg-gradient-to-br from-purple-400 to-pink-400 rounded-lg p-8 text-white">
                <p class="text-2xl font-bold mb-4">1000+</p>
                <p class="text-lg mb-6">Successful Events Delivered</p>
                <p class="mb-8">Join thousands of happy clients who trust us with their special moments.</p>
                <a href="/contact" class="inline-block px-6 py-3 bg-white text-purple-600 font-bold rounded-lg hover:shadow-lg transition">
                    Start Planning
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-purple-600 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Plan Your Event?</h2>
        <p class="text-lg mb-8">Let's turn your vision into reality. Contact us today for a consultation.</p>
        <a href="/contact" class="inline-block px-8 py-3 bg-white text-purple-600 font-bold rounded-lg hover:shadow-lg transition">
            Get In Touch
        </a>
    </div>
</section>
@endsection
