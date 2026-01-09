@extends('layouts.app')

@section('title', 'About Us - EventPro')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-purple-600 to-pink-600 text-white py-16 md:py-24">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">About EventPro</h1>
        <p class="text-lg text-gray-100">Crafting Exceptional Experiences Since 2014</p>
    </div>
</section>

<!-- Our Story -->
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Our Story</h2>
                <p class="text-gray-600 mb-4">EventPro was founded in 2014 by a team of passionate event enthusiasts who believed that every celebration deserves to be extraordinary. What started as a small boutique event planning service has grown into one of the region's most trusted event management companies.</p>
                <p class="text-gray-600 mb-4">Over the past decade, we've had the privilege of creating magical moments for thousands of clients, from intimate gatherings to large-scale corporate events. Our success is built on a foundation of creativity, attention to detail, and genuine care for our clients' visions.</p>
                <p class="text-gray-600">We believe that every event tells a story, and we're honored to be part of yours.</p>
            </div>
            <div class="bg-gradient-to-br from-purple-400 to-pink-400 rounded-lg p-8 text-white">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-purple-600 rounded-lg p-6 text-center">
                        <p class="text-3xl font-bold mb-2">1000+</p>
                        <p class="text-sm">Events Delivered</p>
                    </div>
                    <div class="bg-pink-600 rounded-lg p-6 text-center">
                        <p class="text-3xl font-bold mb-2">50+</p>
                        <p class="text-sm">Team Members</p>
                    </div>
                    <div class="bg-purple-600 rounded-lg p-6 text-center">
                        <p class="text-3xl font-bold mb-2">98%</p>
                        <p class="text-sm">Client Satisfaction</p>
                    </div>
                    <div class="bg-pink-600 rounded-lg p-6 text-center">
                        <p class="text-3xl font-bold mb-2">10+</p>
                        <p class="text-sm">Years Experience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Our Core Values</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition">
                <div class="text-5xl mb-4">✨</div>
                <h3 class="text-xl font-bold mb-4">Excellence</h3>
                <p class="text-gray-600">We strive for perfection in every detail, ensuring your event exceeds expectations.</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition">
                <div class="text-5xl mb-4">💡</div>
                <h3 class="text-xl font-bold mb-4">Creativity</h3>
                <p class="text-gray-600">We bring innovative ideas and unique perspectives to create memorable experiences.</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition">
                <div class="text-5xl mb-4">🤝</div>
                <h3 class="text-xl font-bold mb-4">Partnership</h3>
                <p class="text-gray-600">We work closely with our clients as true partners to realize their vision.</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Team -->
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Meet Our Team</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Team Member 1 -->
            <div class="text-center">
                <div class="bg-gradient-to-br from-purple-400 to-pink-400 rounded-full w-40 h-40 mx-auto mb-4 flex items-center justify-center text-white text-5xl">
                    👨
                </div>
                <h3 class="text-lg font-bold">Sarah Johnson</h3>
                <p class="text-purple-600 font-semibold">Founder & CEO</p>
                <p class="text-gray-600 text-sm mt-2">10+ years of event management experience</p>
            </div>

            <!-- Team Member 2 -->
            <div class="text-center">
                <div class="bg-gradient-to-br from-purple-400 to-pink-400 rounded-full w-40 h-40 mx-auto mb-4 flex items-center justify-center text-white text-5xl">
                    👩
                </div>
                <h3 class="text-lg font-bold">Michael Chen</h3>
                <p class="text-purple-600 font-semibold">Creative Director</p>
                <p class="text-gray-600 text-sm mt-2">Award-winning event designer</p>
            </div>

            <!-- Team Member 3 -->
            <div class="text-center">
                <div class="bg-gradient-to-br from-purple-400 to-pink-400 rounded-full w-40 h-40 mx-auto mb-4 flex items-center justify-center text-white text-5xl">
                    👨
                </div>
                <h3 class="text-lg font-bold">Emma Rodriguez</h3>
                <p class="text-purple-600 font-semibold">Operations Manager</p>
                <p class="text-gray-600 text-sm mt-2">Expert in logistics and coordination</p>
            </div>

            <!-- Team Member 4 -->
            <div class="text-center">
                <div class="bg-gradient-to-br from-purple-400 to-pink-400 rounded-full w-40 h-40 mx-auto mb-4 flex items-center justify-center text-white text-5xl">
                    👩
                </div>
                <h3 class="text-lg font-bold">David Thompson</h3>
                <p class="text-purple-600 font-semibold">Lead Coordinator</p>
                <p class="text-gray-600 text-sm mt-2">Specialist in corporate events</p>
            </div>
        </div>
    </div>
</section>

<!-- Why We're Different -->
<section class="py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:py-4xl font-bold text-center mb-12">What Makes Us Different</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex items-start">
                <svg class="h-8 w-8 text-purple-600 mr-4 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <h3 class="text-lg font-bold mb-2">Personalized Approach</h3>
                    <p class="text-gray-600">We take time to understand your unique needs and preferences</p>
                </div>
            </div>
            <div class="flex items-start">
                <svg class="h-8 w-8 text-purple-600 mr-4 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <h3 class="text-lg font-bold mb-2">Vendor Network</h3>
                    <p class="text-gray-600">Access to carefully vetted, premium vendors and suppliers</p>
                </div>
            </div>
            <div class="flex items-start">
                <svg class="h-8 w-8 text-purple-600 mr-4 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <h3 class="text-lg font-bold mb-2">24/7 Support</h3>
                    <p class="text-gray-600">Round-the-clock assistance for all your event needs</p>
                </div>
            </div>
            <div class="flex items-start">
                <svg class="h-8 w-8 text-purple-600 mr-4 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <h3 class="text-lg font-bold mb-2">Transparent Pricing</h3>
                    <p class="text-gray-600">No hidden costs, clear breakdown of all expenses</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
