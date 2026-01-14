@extends('layouts.app')

@section('title', 'Contact Us - EventPro')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-emerald-600 to-amber-500 text-white py-12 sm:py-16 md:py-24">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">Get In Touch</h1>
        <p class="text-sm sm:text-base md:text-lg text-gray-100">We're here to answer your questions and help plan your perfect event</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-12 sm:py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8 mb-12 md:mb-16">
            <!-- Email -->
            <div class="bg-white rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition">
                <div class="text-5xl mb-4">✉️</div>
                <h3 class="text-xl font-bold mb-2">Email</h3>
                <p class="text-gray-600 mb-4">Send us your inquiry anytime</p>
                <a href="mailto:info@eventpro.com" class="text-emerald-700 font-bold hover:text-emerald-800">
                    info@eventpro.com
                </a>
                <p class="text-sm text-gray-500 mt-2">Response time: Within 24 hours</p>
            </div>

            <!-- Phone -->
            <div class="bg-white rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition">
                <div class="text-5xl mb-4">📞</div>
                <h3 class="text-xl font-bold mb-2">Phone</h3>
                <p class="text-gray-600 mb-4">Call us for immediate assistance</p>
                <a href="tel:+15551234567" class="text-emerald-700 font-bold hover:text-emerald-800 text-lg">
                    +1 (555) 123-4567
                </a>
                <p class="text-sm text-gray-500 mt-2">Mon-Fri: 9AM - 6PM</p>
            </div>

            <!-- Office -->
            <div class="bg-white rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition">
                <div class="text-5xl mb-4">📍</div>
                <h3 class="text-xl font-bold mb-2">Office</h3>
                <p class="text-gray-600 mb-4">Visit us in person</p>
                <div class="text-sm font-semibold text-gray-700">
                    <p>123 Event Street</p>
                    <p>Suite 200</p>
                    <p>New York, NY 10001</p>
                </div>
                <p class="text-sm text-gray-500 mt-2">Mon-Fri: 10AM - 5PM</p>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-white rounded-lg shadow-lg p-8 md:p-12">
            <h2 class="text-3xl font-bold mb-8 text-center">Send Us A Message</h2>
            <form action="#" method="POST" class="max-w-2xl mx-auto">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Full Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                            placeholder="John Doe"
                        >
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                            placeholder="john@example.com"
                        >
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">Phone Number</label>
                        <input 
                            type="tel" 
                            id="phone" 
                            name="phone"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                            placeholder="(555) 123-4567"
                        >
                    </div>
                    <div>
                        <label for="event_date" class="block text-sm font-bold text-gray-700 mb-2">Event Date</label>
                        <input 
                            type="date" 
                            id="event_date" 
                            name="event_date"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                        >
                    </div>
                </div>

                <div class="mb-6">
                    <label for="event_type" class="block text-sm font-bold text-gray-700 mb-2">Event Type</label>
                    <select 
                        id="event_type" 
                        name="event_type"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                    >
                        <option value="">Select an event type</option>
                        <option value="wedding">Wedding</option>
                        <option value="corporate">Corporate Event</option>
                        <option value="birthday">Birthday Party</option>
                        <option value="anniversary">Anniversary</option>
                        <option value="conference">Conference</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="message" class="block text-sm font-bold text-gray-700 mb-2">Message</label>
                    <textarea 
                        id="message" 
                        name="message"
                        rows="5"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                        placeholder="Tell us about your event and vision..."
                    ></textarea>
                </div>

                <div class="mb-6">
                    <label for="guest_count" class="block text-sm font-bold text-gray-700 mb-2">Estimated Guest Count</label>
                    <input 
                        type="number" 
                        id="guest_count" 
                        name="guest_count"
                        min="1"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                        placeholder="Number of guests"
                    >
                </div>

                <div class="flex items-center mb-6">
                    <input 
                        type="checkbox" 
                        id="terms" 
                        name="terms"
                        required
                        class="h-4 w-4 text-emerald-700"
                    >
                    <label for="terms" class="ml-2 text-sm text-gray-600">
                        I agree to be contacted about my inquiry
                    </label>
                </div>

                <div class="text-center">
                    <button 
                        type="submit"
                        class="px-8 py-3 bg-gradient-to-r from-emerald-600 to-amber-500 text-white font-bold rounded-lg hover:shadow-lg transition"
                    >
                        Send Message
                    </button>
                    <p class="text-sm text-gray-500 mt-4">We'll get back to you within 24 hours</p>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Frequently Asked Questions</h2>
        
        <div class="space-y-6">
            <details class="bg-gray-50 rounded-lg p-6 cursor-pointer hover:bg-gray-100 transition" open>
                <summary class="font-bold text-lg text-emerald-700">How far in advance should I book?</summary>
                <p class="text-gray-600 mt-4">We recommend booking at least 3-6 months in advance for weddings and large events. For smaller gatherings, 1-2 months is usually sufficient. We also accept last-minute bookings based on availability.</p>
            </details>

            <details class="bg-gray-50 rounded-lg p-6 cursor-pointer hover:bg-gray-100 transition">
                <summary class="font-bold text-lg text-emerald-700">What is your cancellation policy?</summary>
                <p class="text-gray-600 mt-4">Cancellations made 30 days before the event are eligible for a full refund. Cancellations within 30 days may incur a 50% service fee. For more details, please contact us directly.</p>
            </details>

            <details class="bg-gray-50 rounded-lg p-6 cursor-pointer hover:bg-gray-100 transition">
                <summary class="font-bold text-lg text-emerald-700">Do you work outside our city?</summary>
                <p class="text-gray-600 mt-4">Yes! We offer destination event planning services. We've organized events across the country and internationally. Additional travel costs will apply. Contact us for more information.</p>
            </details>

            <details class="bg-gray-50 rounded-lg p-6 cursor-pointer hover:bg-gray-100 transition">
                <summary class="font-bold text-lg text-emerald-700">Can you work within a specific budget?</summary>
                <p class="text-gray-600 mt-4">Absolutely! We specialize in creating amazing events at all price points. Tell us your budget and vision, and we'll design a package that works for you.</p>
            </details>

            <details class="bg-gray-50 rounded-lg p-6 cursor-pointer hover:bg-gray-100 transition">
                <summary class="font-bold text-lg text-emerald-700">What's included in full planning services?</summary>
                <p class="text-gray-600 mt-4">Our full planning services include venue selection, vendor coordination, budget management, design and styling, timeline creation, and day-of coordination. We handle every detail so you can relax and enjoy your event.</p>
            </details>
        </div>
    </div>
</section>

<!-- Social Media CTA -->
<section class="bg-gradient-to-r from-emerald-600 to-amber-500 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Follow Us For Inspiration</h2>
        <p class="text-lg mb-8">Check out our latest events and ideas on social media</p>
        <div class="flex justify-center gap-6">
            <a href="#" class="text-3xl hover:scale-110 transition">f</a>
            <a href="#" class="text-3xl hover:scale-110 transition">📷</a>
            <a href="#" class="text-3xl hover:scale-110 transition">𝕏</a>
            <a href="#" class="text-3xl hover:scale-110 transition">in</a>
        </div>
    </div>
</section>
@endsection
