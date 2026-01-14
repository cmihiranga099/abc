@extends('layouts.app')

@section('title', $booking->event_name . ' - EventPro')

@section('content')
<div class="min-h-screen bg-slate-50">
    <div class="mx-auto w-full max-w-3xl px-4 py-6 sm:px-6 lg:px-8 lg:py-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('bookings.index') }}" class="text-emerald-700 hover:text-emerald-800 font-medium">← Back to Bookings</a>
        </div>

        <!-- Booking Card -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
            <!-- Header with Status -->
            <div class="bg-gradient-to-r {{ $booking->status === 'confirmed' ? 'from-green-500 to-emerald-600' : ($booking->status === 'completed' ? 'from-blue-500 to-cyan-600' : ($booking->status === 'cancelled' ? 'from-red-500 to-amber-500' : 'from-yellow-500 to-orange-600')) }} text-white p-6 sm:p-8">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold">{{ $booking->event_name }}</h1>
                        <p class="text-white/80 mt-2">Booking #{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <span class="px-4 py-2 bg-white/20 rounded-full font-bold text-sm sm:text-base">{{ ucfirst($booking->status) }}</span>
                </div>
            </div>

            <div class="p-6 sm:p-8">
                <!-- Event Details Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8 pb-8 border-b">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">📅 Event Date</p>
                        <p class="text-lg font-bold text-gray-900">{{ $booking->event_date->format('F j, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-medium">📍 Location</p>
                        <p class="text-lg font-bold text-gray-900">{{ $booking->location }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-medium">👥 Guests</p>
                        <p class="text-lg font-bold text-gray-900">{{ $booking->guest_count }} people</p>
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-medium">💰 Total Price</p>
                        <p class="text-2xl font-bold text-emerald-700">${{ number_format($booking->total_price, 2) }}</p>
                    </div>
                </div>

                <!-- Package Details -->
                <div class="mb-8 pb-8 border-b">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">📦 Package Details</h2>
                    <div class="bg-slate-50 rounded-lg p-4 sm:p-6">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">{{ $booking->package->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $booking->package->description }}</p>
                        @if($booking->package->features)
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                @foreach($booking->package->features as $feature)
                                    <div class="flex items-center text-sm">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span class="text-gray-700">{{ $feature }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Special Requirements (if any) -->
                @if($booking->special_requirements)
                    <div class="mb-8 pb-8 border-b">
                        <h2 class="text-lg font-bold text-gray-800 mb-3">📝 Special Requirements</h2>
                        <p class="text-gray-700 bg-emerald-50 p-4 rounded-lg">{{ $booking->special_requirements }}</p>
                    </div>
                @endif

                <!-- Payment Status Section -->
                <div class="mb-8">
                    <h2 class="text-lg font-bold text-gray-800 mb-4">💳 Payment Status</h2>
                    @if($booking->status === 'pending')
                        <div class="bg-amber-50 border-2 border-amber-300 rounded-lg p-4 sm:p-6">
                            <p class="text-sm text-amber-800 mb-4">Your booking is awaiting payment. Complete the payment to confirm your event.</p>
                            <a href="{{ route('payments.create', $booking->id) }}" class="inline-block px-8 py-3 bg-gradient-to-r from-emerald-600 to-amber-500 text-white rounded-lg hover:shadow-lg transition font-bold">
                                💰 Pay Now - ${{ number_format($booking->total_price, 2) }}
                            </a>
                        </div>
                    @elseif($booking->payment && $booking->payment->status === 'completed')
                        <div class="bg-green-50 border-2 border-green-300 rounded-lg p-4 sm:p-6">
                            <p class="text-sm text-green-800 mb-2">✓ Payment Completed</p>
                            <p class="text-gray-700 text-sm">
                                Transaction ID: <span class="font-bold">{{ $booking->payment->transaction_id }}</span><br>
                                Payment Date: <span class="font-bold">{{ $booking->payment->created_at->format('F j, Y g:i A') }}</span>
                            </p>
                        </div>
                    @elseif($booking->payment && $booking->payment->status === 'refunded')
                        <div class="bg-red-50 border-2 border-red-300 rounded-lg p-4 sm:p-6">
                            <p class="text-sm text-red-800">✗ Refunded</p>
                            <p class="text-gray-700 text-sm mt-2">This booking has been cancelled and the payment has been refunded.</p>
                        </div>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t">
                    @if($booking->status === 'pending')
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="px-6 py-2.5 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition font-medium text-center">
                            ✏️ Edit Booking
                        </a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to cancel this booking?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-full px-6 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium">
                                ❌ Cancel Booking
                            </button>
                        </form>
                    @elseif($booking->status === 'confirmed' && $booking->payment && $booking->payment->status === 'completed')
                        <p class="text-gray-600 text-sm">Your booking is confirmed! We'll contact you with further details.</p>
                        <form action="{{ route('payments.refund', $booking->payment->id) }}" method="POST" onsubmit="return confirm('Request a refund for this booking?')">
                            @csrf @method('POST')
                            <button type="submit" class="px-6 py-2.5 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition font-medium">
                                🔄 Request Refund
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
