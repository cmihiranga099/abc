@extends('layouts.app')

@section('title', 'Admin Dashboard - EventPro')

@section('content')
<section class="py-8 sm:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-6 sm:mb-8">Admin Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
            <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <h2 class="font-bold text-lg mb-2">Site Overview</h2>
                <p class="text-gray-600 text-sm sm:text-base">Manage events, packages, users and more from here.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <h2 class="font-bold text-lg mb-2">Quick Actions</h2>
                <ul class="list-disc list-inside text-gray-600 text-sm sm:text-base space-y-1">
                    <li>Create or edit packages</li>
                    <li>Manage users and roles</li>
                    <li>Review bookings</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
