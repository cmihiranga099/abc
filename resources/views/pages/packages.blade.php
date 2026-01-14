@extends('layouts.app')

@section('title', 'Event Packages - EventPro')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-emerald-600 to-amber-500 text-white py-12 sm:py-16 md:py-24">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">Event Packages</h1>
        <p class="text-sm sm:text-base md:text-lg text-gray-100">Choose the perfect package for your special event</p>
    </div>
</section>

<!-- Pricing Section -->
<section class="py-12 sm:py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center mb-2 sm:mb-4">Our Pricing Plans</h2>
        <p class="text-center text-gray-600 text-sm sm:text-base mb-8 sm:mb-12">Select the package that best fits your needs</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
            <!-- Starter Package -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-1 md:hover:-translate-y-2">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 sm:p-8 text-center">
                    <h3 class="text-xl sm:text-2xl font-bold mb-2">Starter</h3>
                    <p class="text-3xl sm:text-4xl font-bold mb-4">$1,500</p>
                    <p class="text-xs sm:text-sm opacity-90">For gatherings up to 50 guests</p>
                </div>
                <div class="p-6 sm:p-8">
                    <ul class="space-y-3 sm:space-y-4 mb-6 sm:mb-8">
                        <li class="flex items-center text-sm sm:text-base">
                            <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Basic Coordination</span>
                        </li>
                        <li class="flex items-center text-sm sm:text-base">
                            <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Venue Sourcing</span>
                        </li>
                        <li class="flex items-center text-sm sm:text-base">
                            <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Vendor Referrals</span>
                        </li>
                        <li class="flex items-center text-sm sm:text-base">
                            <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Day-of Timeline</span>
                        </li>
                        <li class="flex items-center text-sm sm:text-base text-gray-400">
                            <svg class="h-4 sm:h-5 w-4 sm:w-5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Full Planning</span>
                        </li>
                    </ul>
                    <a href="/contact" class="w-full px-4 py-2.5 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 transition text-center block text-sm sm:text-base">
                        Choose Plan
                    </a>
                </div>
            </div>

            <!-- Professional Package -->
            <div class="bg-white rounded-lg shadow-2xl overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-1 md:hover:-translate-y-2 border-4 border-emerald-500 relative">
                <div class="absolute top-0 right-0 bg-emerald-500 text-white px-3 sm:px-4 py-1 text-xs sm:text-sm font-bold">POPULAR</div>
                <div class="bg-gradient-to-r from-emerald-600 to-amber-500 text-white p-6 sm:p-8 text-center">
                    <h3 class="text-xl sm:text-2xl font-bold mb-2">Professional</h3>
                    <p class="text-3xl sm:text-4xl font-bold mb-4">$4,500</p>
                    <p class="text-xs sm:text-sm opacity-90">For gatherings up to 200 guests</p>
                </div>
                <div class="p-6 sm:p-8">
                    <ul class="space-y-3 sm:space-y-4 mb-6 sm:mb-8">
                        <li class="flex items-center text-sm sm:text-base">
                            <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Full Event Planning</span>
                        </li>
                        <li class="flex items-center text-sm sm:text-base">
                            <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Custom Design</span>
                        </li>
                        <li class="flex items-center text-sm sm:text-base">
                            <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Vendor Management</span>
                        </li>
                        <li class="flex items-center text-sm sm:text-base">
                            <svg class="h-4 sm:h-5 w-4 sm:w-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Budget Management</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Day-of Coordination</span>
                        </li>
                    </ul>
                    <a href="/contact" class="w-full px-4 py-2 bg-gradient-to-r from-emerald-600 to-amber-500 text-white font-bold rounded-lg hover:shadow-lg transition text-center block">
                        Choose Plan
                    </a>
                </div>
            </div>

            <!-- Premium Package -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-2">
                <div class="bg-gradient-to-r from-yellow-500 to-orange-600 text-white p-8 text-center">
                    <h3 class="text-2xl font-bold mb-2">Premium</h3>
                    <p class="text-4xl font-bold mb-4">Custom</p>
                    <p class="text-sm opacity-90">For large events 200+ guests</p>
                </div>
                <div class="p-8">
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Complete Event Management</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Premium Branding</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>VIP Vendor Network</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>24/7 Support</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Post-Event Services</span>
                        </li>
                    </ul>
                    <a href="/contact" class="w-full px-4 py-2 bg-yellow-500 text-white font-bold rounded-lg hover:bg-yellow-600 transition text-center block">
                        Get Quote
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Add-ons -->
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Add-On Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gray-50 rounded-lg p-6 border-l-4 border-emerald-600">
                <h3 class="font-bold text-lg mb-2">Photography</h3>
                <p class="text-gray-600 text-sm mb-2">Professional photo coverage</p>
                <p class="text-emerald-700 font-bold">+ $500</p>
            </div>
            <div class="bg-gray-50 rounded-lg p-6 border-l-4 border-amber-600">
                <h3 class="font-bold text-lg mb-2">Videography</h3>
                <p class="text-gray-600 text-sm mb-2">Full event video production</p>
                <p class="text-amber-600 font-bold">+ $800</p>
            </div>
            <div class="bg-gray-50 rounded-lg p-6 border-l-4 border-emerald-600">
                <h3 class="font-bold text-lg mb-2">DJ & Sound</h3>
                <p class="text-gray-600 text-sm mb-2">Professional DJ and sound system</p>
                <p class="text-emerald-700 font-bold">+ $600</p>
            </div>
            <div class="bg-gray-50 rounded-lg p-6 border-l-4 border-amber-600">
                <h3 class="font-bold text-lg mb-2">Catering</h3>
                <p class="text-gray-600 text-sm mb-2">Premium catering service</p>
                <p class="text-amber-600 font-bold">+ Varies</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-gradient-to-r from-emerald-600 to-amber-500 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Book Your Event?</h2>
        <p class="text-lg mb-8">Contact us today to customize your perfect package</p>
        <a href="/contact" class="inline-block px-8 py-3 bg-white text-emerald-700 font-bold rounded-lg hover:shadow-lg transition">
            Get Started
        </a>
    </div>
</section>
@endsection
