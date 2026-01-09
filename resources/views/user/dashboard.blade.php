@extends('layouts.app')

@section('title', 'Dashboard - EventPro')

@section('content')
<section class="py-8 sm:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4 sm:mb-6">Welcome to your Dashboard</h1>
        <p class="text-gray-600 mb-6 sm:mb-8 text-sm sm:text-base">Here you can manage your bookings, view packages, and update your profile.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
            <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <h3 class="font-bold mb-2 text-base sm:text-lg">My Bookings</h3>
                <p class="text-gray-600 text-sm sm:text-base">View and manage your event bookings.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <h3 class="font-bold mb-2 text-base sm:text-lg">Available Packages</h3>
                <p class="text-gray-600 text-sm sm:text-base">Explore packages and add-ons.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <h3 class="font-bold mb-2 text-base sm:text-lg">Profile</h3>
                <p class="text-gray-600 text-sm sm:text-base">Update your personal information and preferences.</p>
            </div>
        </div>
    </div>
</section>
@endsection
