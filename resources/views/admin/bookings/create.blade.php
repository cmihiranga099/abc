@extends('layouts.app')

@section('title', 'Create Booking - EventPro')

@section('content')
<section class="min-h-screen bg-slate-50 py-8">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-slate-900">Create Booking</h1>
            <p class="text-sm text-slate-500">Add a new booking manually.</p>
        </div>

        <form action="{{ route('admin.bookings.store') }}" method="POST" class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            @csrf

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-medium text-slate-700">Customer</label>
                    <select name="user_id" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                        <option value="">Select user</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                    @error('user_id') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Package</label>
                    <select name="package_id" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                        <option value="">Select package</option>
                        @foreach($packages as $package)
                            <option value="{{ $package->id }}" @selected(old('package_id') == $package->id)>{{ $package->name }}</option>
                        @endforeach
                    </select>
                    @error('package_id') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Event Name</label>
                    <input type="text" name="event_name" value="{{ old('event_name') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                    @error('event_name') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Event Date</label>
                    <input type="date" name="event_date" value="{{ old('event_date') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                    @error('event_date') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Location</label>
                    <input type="text" name="location" value="{{ old('location') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                    @error('location') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Guest Count</label>
                    <input type="number" name="guest_count" value="{{ old('guest_count') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                    @error('guest_count') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Total Price</label>
                    <input type="number" step="0.01" name="total_price" value="{{ old('total_price') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                    @error('total_price') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Status</label>
                    <select name="status" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                        @foreach(['pending', 'confirmed', 'completed', 'cancelled'] as $status)
                            <option value="{{ $status }}" @selected(old('status') === $status)>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                    @error('status') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div class="sm:col-span-2">
                    <label class="text-sm font-medium text-slate-700">Special Requirements</label>
                    <textarea name="special_requirements" rows="3" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">{{ old('special_requirements') }}</textarea>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <a href="{{ route('admin.bookings.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700">Cancel</a>
                <button type="submit" class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">Create Booking</button>
            </div>
        </form>
    </div>
</section>
@endsection
