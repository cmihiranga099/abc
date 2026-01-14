@extends('layouts.app')

@section('title', 'My Bookings - EventPro')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-emerald-50 to-slate-50 py-8 sm:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 sm:mb-12">
            <div>
                <h1 class="text-3xl sm:text-4xl font-bold mb-2">My Bookings</h1>
                <p class="text-gray-600 text-sm sm:text-base">Manage all your event bookings and track their status</p>
            </div>
            <a href="{{ route('bookings.create') }}" class="mt-4 sm:mt-0 px-6 sm:px-8 py-2.5 sm:py-3 bg-gradient-to-r from-emerald-600 to-amber-500 text-white font-bold rounded-lg hover:shadow-lg transition inline-block text-sm sm:text-base">
                + New Booking
            </a>
        </div>

        @if(session('success'))
            <div class="mb-8 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if($bookings->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($bookings as $booking)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                        <!-- Header -->
                        <div class="bg-gradient-to-r 
                            @if($booking->status === 'pending') from-yellow-500 to-orange-500
                            @elseif($booking->status === 'confirmed') from-green-500 to-emerald-500
                            @elseif($booking->status === 'cancelled') from-red-500 to-amber-400
                            @else from-blue-500 to-cyan-500
                            @endif
                            text-white p-4 sm:p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-bold">{{ $booking->event_name }}</h3>
                                <span class="text-xs sm:text-sm bg-white/20 px-3 py-1 rounded-full font-bold">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                            <p class="text-sm opacity-90">{{ $booking->package->name }} Package</p>
                        </div>

                        <!-- Details -->
                        <div class="p-4 sm:p-6 space-y-3">
                            <div class="flex items-center text-gray-700">
                                <span class="text-lg mr-3">📅</span>
                                <div>
                                    <p class="text-xs text-gray-500">Event Date</p>
                                    <p class="font-semibold text-sm">{{ $booking->event_date->format('M d, Y') }}</p>
                                </div>
                            </div>

                            <div class="flex items-center text-gray-700">
                                <span class="text-lg mr-3">📍</span>
                                <div>
                                    <p class="text-xs text-gray-500">Location</p>
                                    <p class="font-semibold text-sm">{{ $booking->location }}</p>
                                </div>
                            </div>

                            <div class="flex items-center text-gray-700">
                                <span class="text-lg mr-3">👥</span>
                                <div>
                                    <p class="text-xs text-gray-500">Guests</p>
                                    <p class="font-semibold text-sm">{{ $booking->guest_count }} people</p>
                                </div>
                            </div>

                            <div class="flex items-center text-gray-700 pt-2 border-t">
                                <span class="text-lg mr-3">💰</span>
                                <div>
                                    <p class="text-xs text-gray-500">Total Price</p>
                                    <p class="font-bold text-lg text-emerald-700">${{ number_format($booking->total_price, 2) }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="p-4 sm:p-6 border-t bg-gray-50 flex flex-col sm:flex-row gap-2">
                            <a href="{{ route('bookings.show', $booking) }}" class="flex-1 text-center px-3 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition font-medium text-sm">
                                View Details
                            </a>

                            @if($booking->status === 'pending')
                                <div class="flex gap-2 flex-1 flex-col sm:flex-row">
                                    <a href="{{ route('bookings.edit', $booking) }}" class="flex-1 text-center px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition font-medium text-xs sm:text-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="w-full px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition font-medium text-xs sm:text-sm">
                                            Cancel
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow-lg p-12 text-center">
                <div class="text-5xl mb-4">📭</div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">No Bookings Yet</h2>
                <p class="text-gray-600 mb-6">Start planning your perfect event by creating your first booking</p>
                <a href="{{ route('bookings.create') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-emerald-600 to-amber-500 text-white rounded-lg hover:shadow-lg transition font-bold">
                    Create Your First Booking
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
