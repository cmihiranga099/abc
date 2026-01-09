@extends('layouts.app')

@section('title', 'Create Booking - EventPro')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-purple-50 to-slate-50 py-8 sm:py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('bookings.index') }}" class="text-purple-600 hover:text-purple-800 font-medium">← Back to Bookings</a>
            <h1 class="text-3xl sm:text-4xl font-bold mt-4 mb-2">Create New Booking</h1>
            <p class="text-gray-600">Select a package and fill in your event details</p>
        </div>

        <form action="{{ route('bookings.store') }}" method="POST" class="bg-white rounded-lg shadow-lg p-6 sm:p-8">
            @csrf

            <!-- Step 1: Select Package -->
            <div class="mb-8 pb-8 border-b">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6">Step 1: Choose Package</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
                    @foreach($packages as $package)
                        <label class="cursor-pointer">
                            <input type="radio" name="package_id" value="{{ $package->id }}" class="hidden peer" required {{ old('package_id') == $package->id ? 'checked' : '' }}>
                            <div class="p-4 sm:p-6 border-2 rounded-lg peer-checked:border-purple-600 peer-checked:bg-purple-50 hover:border-purple-300 transition">
                                <h3 class="font-bold text-lg mb-1">{{ $package->name }}</h3>
                                <p class="text-purple-600 font-bold text-2xl mb-2">${{ number_format($package->price, 2) }}</p>
                                <p class="text-xs text-gray-600 mb-3">{{ $package->description }}</p>
                                <p class="text-xs text-gray-500">Up to {{ $package->max_guests }} guests</p>
                            </div>
                        </label>
                    @endforeach
                </div>
                @error('package_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Step 2: Event Details -->
            <div class="mb-8">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6">Step 2: Event Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Event Name -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Event Name *</label>
                        <input type="text" name="event_name" value="{{ old('event_name') }}" placeholder="e.g., Sarah & Mike's Wedding" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                        @error('event_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Event Date -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Event Date *</label>
                        <input type="date" name="event_date" value="{{ old('event_date') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                        @error('event_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Location *</label>
                        <input type="text" name="location" value="{{ old('location') }}" placeholder="City, Venue Name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                        @error('location') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Guest Count -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Number of Guests *</label>
                        <input type="number" name="guest_count" value="{{ old('guest_count') }}" placeholder="10-500" min="10" max="500" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                        @error('guest_count') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Special Requirements -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Special Requirements</label>
                        <textarea name="special_requirements" placeholder="Any special requests or requirements?" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">{{ old('special_requirements') }}</textarea>
                        @error('special_requirements') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row gap-4 justify-end pt-6 border-t">
                <a href="{{ route('bookings.index') }}" class="px-6 py-2.5 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition font-medium text-center">
                    Cancel
                </a>
                <button type="submit" class="px-8 py-2.5 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg hover:shadow-lg transition font-bold">
                    Create Booking
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
