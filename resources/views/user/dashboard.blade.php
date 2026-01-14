@extends('layouts.app')

@section('title', 'Customer Dashboard - EventPro')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-emerald-50 to-slate-50 py-8 sm:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Welcome Header -->
        <div class="mb-8 sm:mb-12">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-2">Welcome, {{ $user->name }}! 👋</h1>
            <p class="text-gray-600 text-sm sm:text-base md:text-lg">Manage your bookings, packages, and payments all in one place</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 mb-8 sm:mb-12">
            <!-- Total Bookings -->
            <div class="bg-gradient-to-br from-emerald-500 to-amber-500 rounded-lg shadow-lg p-6 text-white hover:shadow-xl transition">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-emerald-200 text-sm font-medium">Total Bookings</p>
                        <p class="text-3xl font-bold mt-2">{{ $totalBookings }}</p>
                    </div>
                    <div class="text-4xl opacity-20">📅</div>
                </div>
            </div>

            <!-- Confirmed Events -->
            <div class="bg-gradient-to-br from-amber-400 to-amber-500 rounded-lg shadow-lg p-6 text-white hover:shadow-xl transition">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-amber-200 text-sm font-medium">Confirmed Events</p>
                        <p class="text-3xl font-bold mt-2">{{ $confirmedBookings }}</p>
                    </div>
                    <div class="text-4xl opacity-20">✅</div>
                </div>
            </div>

            <!-- Total Spent -->
            <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-lg shadow-lg p-6 text-white hover:shadow-xl transition">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-cyan-200 text-sm font-medium">Total Spent</p>
                        <p class="text-3xl font-bold mt-2">${{ number_format($totalSpent, 2) }}</p>
                    </div>
                    <div class="text-4xl opacity-20">💰</div>
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="bg-gradient-to-br from-teal-500 to-teal-600 rounded-lg shadow-lg p-6 text-white hover:shadow-xl transition">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-teal-200 text-sm font-medium">Upcoming Events</p>
                        <p class="text-3xl font-bold mt-2">{{ $upcomingBookings }}</p>
                    </div>
                    <div class="text-4xl opacity-20">🎉</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 sm:mb-12">
            <!-- New Booking CTA -->
            <a href="{{ route('bookings.create') }}" class="group bg-gradient-to-r from-emerald-600 to-amber-500 rounded-lg shadow-lg p-8 text-white hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl sm:text-2xl font-bold mb-2">Create New Booking</h3>
                        <p class="text-emerald-100 text-sm sm:text-base">Browse packages and plan your perfect event</p>
                    </div>
                    <div class="text-4xl sm:text-5xl group-hover:scale-110 transition">📦</div>
                </div>
            </a>

            <!-- View All Bookings -->
            <a href="{{ route('bookings.index') }}" class="group bg-gradient-to-r from-cyan-500 to-blue-600 rounded-lg shadow-lg p-8 text-white hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl sm:text-2xl font-bold mb-2">My Bookings</h3>
                        <p class="text-cyan-100 text-sm sm:text-base">View and manage all your event bookings</p>
                    </div>
                    <div class="text-4xl sm:text-5xl group-hover:scale-110 transition">📋</div>
                </div>
            </a>
        </div>

        <!-- Recent Bookings -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-emerald-600 to-amber-500 text-white p-6 sm:p-8">
                <h2 class="text-2xl font-bold">Recent Bookings</h2>
                <p class="text-emerald-100 mt-1">Your latest event bookings</p>
            </div>

            <div class="overflow-x-auto">
                @if($totalBookings > 0)
                    <table class="w-full">
                        <thead class="bg-gray-100 border-b border-gray-200">
                            <tr>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-700">Event Name</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-700">Package</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-700">Date</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-700">Status</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-700">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentBookings as $booking)
                                <tr class="border-b hover:bg-gray-50 transition">
                                    <td class="px-4 sm:px-6 py-4 text-xs sm:text-sm text-gray-800 font-medium">{{ $booking->event_name }}</td>
                                    <td class="px-4 sm:px-6 py-4 text-xs sm:text-sm text-gray-600">{{ $booking->package->name }}</td>
                                    <td class="px-4 sm:px-6 py-4 text-xs sm:text-sm text-gray-600">{{ $booking->event_date->format('M d, Y') }}</td>
                                    <td class="px-4 sm:px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-xs font-bold
                                            @if($booking->status === 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($booking->status === 'confirmed') bg-green-100 text-green-800
                                            @elseif($booking->status === 'cancelled') bg-red-100 text-red-800
                                            @else bg-blue-100 text-blue-800
                                            @endif">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4">
                                        <a href="{{ route('bookings.show', $booking) }}" class="text-emerald-700 hover:text-emerald-800 font-medium text-xs sm:text-sm">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-8 text-center">
                        <p class="text-gray-600 text-sm sm:text-base mb-4">No bookings yet. Create your first event booking today!</p>
                        <a href="{{ route('bookings.create') }}" class="inline-block px-6 py-2.5 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition font-medium text-sm">
                            Create Booking
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
