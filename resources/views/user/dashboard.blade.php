@extends('layouts.app')

@section('title', 'Dashboard - EventPro')

@section('content')
<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6">Welcome to your Dashboard</h1>
        <p class="text-gray-600 mb-6">Here you can manage your bookings, view packages, and update your profile.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="font-bold mb-2">My Bookings</h3>
                <p class="text-gray-600">View and manage your event bookings.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="font-bold mb-2">Available Packages</h3>
                <p class="text-gray-600">Explore packages and add-ons.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="font-bold mb-2">Profile</h3>
                <p class="text-gray-600">Update your personal information and preferences.</p>
            </div>
        </div>
    </div>
</section>
@endsection
