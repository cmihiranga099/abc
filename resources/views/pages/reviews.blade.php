@extends('layouts.app')

@section('title', 'Reviews & Testimonials - EventPro')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-purple-600 to-pink-600 text-white py-12 sm:py-16 md:py-24">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">What Our Clients Say</h1>
        <p class="text-sm sm:text-base md:text-lg text-gray-100">Join thousands of satisfied customers</p>
    </div>
</section>

<!-- Rating Summary -->
<section class="py-12 sm:py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 md:gap-8 text-center mb-12 sm:mb-16">
            <div>
                <p class="text-3xl sm:text-4xl md:text-5xl font-bold text-purple-600 mb-2">4.9/5</p>
                <div class="flex justify-center mb-2">
                    <span class="text-yellow-400 text-xl sm:text-2xl">★★★★★</span>
                </div>
                <p class="text-gray-600 text-sm sm:text-base">Average Rating</p>
            </div>
            <div>
                <p class="text-3xl sm:text-4xl md:text-5xl font-bold text-pink-600 mb-2">1000+</p>
                <p class="text-gray-600 text-sm sm:text-base md:text-lg">Happy Clients</p>
                <p class="text-gray-500 text-xs sm:text-sm">Across various event types</p>
            </div>
            <div>
                <p class="text-3xl sm:text-4xl md:text-5xl font-bold text-purple-600 mb-2">98%</p>
                <p class="text-gray-600 text-sm sm:text-base md:text-lg">Satisfaction Rate</p>
                <p class="text-gray-500 text-xs sm:text-sm">Would recommend to a friend</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-12 sm:py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Client Testimonials</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <!-- Review 1 -->
            <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full flex items-center justify-center text-white text-xl font-bold">
                        JM
                    </div>
                    <div class="ml-4">
                        <h3 class="font-bold">Jennifer & Michael</h3>
                        <p class="text-sm text-gray-600">Wedding - June 2024</p>
                    </div>
                </div>
                <div class="flex text-yellow-400 mb-3">
                    ★★★★★
                </div>
                <p class="text-gray-600 mb-4">"EventPro transformed our wedding vision into reality! Sarah and her team handled every detail with professionalism and creativity. Our guests are still talking about how perfect everything was. Highly recommended!"</p>
                <p class="text-sm text-gray-500">Rating: 5/5</p>
            </div>

            <!-- Review 2 -->
            <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-purple-400 rounded-full flex items-center justify-center text-white text-xl font-bold">
                        RC
                    </div>
                    <div class="ml-4">
                        <h3 class="font-bold">Robert Chen</h3>
                        <p class="text-sm text-gray-600">Corporate Event - May 2024</p>
                    </div>
                </div>
                <div class="flex text-yellow-400 mb-3">
                    ★★★★★
                </div>
                <p class="text-gray-600 mb-4">"Professional, creative, and reliable! EventPro organized our annual corporate gala for 300+ attendees. The attention to detail and vendor coordination was exceptional. Can't wait to work with them again!"</p>
                <p class="text-sm text-gray-500">Rating: 5/5</p>
            </div>

            <!-- Review 3 -->
            <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-orange-400 rounded-full flex items-center justify-center text-white text-xl font-bold">
                        SR
                    </div>
                    <div class="ml-4">
                        <h3 class="font-bold">Sarah Rodriguez</h3>
                        <p class="text-sm text-gray-600">Birthday Party - April 2024</p>
                    </div>
                </div>
                <div class="flex text-yellow-400 mb-3">
                    ★★★★★
                </div>
                <p class="text-gray-600 mb-4">"My daughter's 16th birthday was absolutely magical! EventPro created the perfect atmosphere with creative decorations and entertainment. The team was friendly and made everything so easy!"</p>
                <p class="text-sm text-gray-500">Rating: 5/5</p>
            </div>

            <!-- Review 4 -->
            <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-blue-400 rounded-full flex items-center justify-center text-white text-xl font-bold">
                        DT
                    </div>
                    <div class="ml-4">
                        <h3 class="font-bold">David Thompson</h3>
                        <p class="text-sm text-gray-600">Conference - March 2024</p>
                    </div>
                </div>
                <div class="flex text-yellow-400 mb-3">
                    ★★★★★
                </div>
                <p class="text-gray-600 mb-4">"EventPro's team managed our 3-day conference with incredible efficiency. From registration to networking events, everything was perfectly organized. The feedback from attendees was overwhelmingly positive!"</p>
                <p class="text-sm text-gray-500">Rating: 5/5</p>
            </div>

            <!-- Review 5 -->
            <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-blue-400 rounded-full flex items-center justify-center text-white text-xl font-bold">
                        ES
                    </div>
                    <div class="ml-4">
                        <h3 class="font-bold">Emily Smith</h3>
                        <p class="text-sm text-gray-600">Engagement Party - February 2024</p>
                    </div>
                </div>
                <div class="flex text-yellow-400 mb-3">
                    ★★★★☆
                </div>
                <p class="text-gray-600 mb-4">"Exceptional service! EventPro made planning our engagement party stress-free. They listened to our ideas and delivered beyond expectations. The venue was beautiful and our guests had a wonderful time!"</p>
                <p class="text-sm text-gray-500">Rating: 4.5/5</p>
            </div>

            <!-- Review 6 -->
            <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-purple-400 rounded-full flex items-center justify-center text-white text-xl font-bold">
                        ML
                    </div>
                    <div class="ml-4">
                        <h3 class="font-bold">Maria Lopez</h3>
                        <p class="text-sm text-gray-600">Wedding Reception - January 2024</p>
                    </div>
                </div>
                <div class="flex text-yellow-400 mb-3">
                    ★★★★★
                </div>
                <p class="text-gray-600 mb-4">"EventPro is amazing! They handled everything so smoothly. From vendor coordination to timeline management, not a single detail was overlooked. My wedding day was absolutely perfect!"</p>
                <p class="text-sm text-gray-500">Rating: 5/5</p>
            </div>
        </div>
    </div>
</section>

<!-- Service Categories -->
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Highly Rated For</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-lg p-8 text-center">
                <p class="text-5xl mb-4">⭐</p>
                <h3 class="text-2xl font-bold mb-2">Professionalism</h3>
                <p class="text-gray-600">Expert team handling every aspect</p>
            </div>
            <div class="bg-gradient-to-br from-blue-100 to-purple-100 rounded-lg p-8 text-center">
                <p class="text-5xl mb-4">💡</p>
                <h3 class="text-2xl font-bold mb-2">Creativity</h3>
                <p class="text-gray-600">Unique ideas that make events memorable</p>
            </div>
            <div class="bg-gradient-to-br from-pink-100 to-orange-100 rounded-lg p-8 text-center">
                <p class="text-5xl mb-4">✨</p>
                <h3 class="text-2xl font-bold mb-2">Attention to Detail</h3>
                <p class="text-gray-600">Nothing overlooked, everything perfect</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="bg-gradient-to-r from-purple-600 to-pink-600 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Join Our Happy Clients?</h2>
        <p class="text-lg mb-8">Let us create your unforgettable event experience</p>
        <a href="/contact" class="inline-block px-8 py-3 bg-white text-purple-600 font-bold rounded-lg hover:shadow-lg transition">
            Get Your Quote Today
        </a>
    </div>
</section>
@endsection
