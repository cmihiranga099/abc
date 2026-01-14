@extends('layouts.app')

@section('title', 'Customer Dashboard - EventPro')

@section('content')
<div class="min-h-screen bg-slate-50">
    <div class="mx-auto flex w-full max-w-7xl gap-6 px-4 py-6 sm:px-6 lg:px-8 lg:py-8">
        <!-- Sidebar -->
        <aside class="hidden w-64 flex-shrink-0 lg:block">
            <div class="rounded-2xl border border-emerald-100 bg-white/80 p-5 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-amber-400 text-white font-bold">
                        EP
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-slate-900">EventPro</p>
                        <p class="text-xs text-slate-500">Customer Portal</p>
                    </div>
                </div>

                <nav class="mt-8 space-y-2 text-sm">
                    <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 rounded-xl bg-emerald-50 px-3 py-2 font-semibold text-emerald-700">
                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                        Dashboard
                    </a>
                    <a href="{{ route('bookings.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-900">
                        <span class="h-2 w-2 rounded-full bg-amber-400"></span>
                        Bookings
                    </a>
                    <a href="{{ route('payments.history') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-900">
                        <span class="h-2 w-2 rounded-full bg-teal-400"></span>
                        Payments
                    </a>
                    <a href="{{ route('packages') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-900">
                        <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                        Packages
                    </a>
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-900">
                        <span class="h-2 w-2 rounded-full bg-slate-400"></span>
                        Profile
                    </a>
                </nav>

                <div class="mt-8 rounded-xl border border-emerald-100 bg-gradient-to-br from-emerald-50 to-amber-50 p-4">
                    <p class="text-xs uppercase tracking-wide text-emerald-700">Next step</p>
                    <p class="mt-1 text-sm font-semibold text-slate-900">Book your next event</p>
                    <a href="{{ route('bookings.create') }}" class="mt-3 inline-flex w-full items-center justify-center rounded-lg bg-emerald-600 px-3 py-2 text-xs font-semibold text-white hover:bg-emerald-700">
                        Create Booking
                    </a>
                </div>
            </div>

            <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-600 text-white font-semibold">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">{{ $user->name }}</p>
                        <p class="text-xs text-slate-500">Active customer</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main -->
        <section class="min-w-0 flex-1">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-7">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-emerald-700">Dashboard</p>
                        <h1 class="mt-2 text-2xl font-semibold text-slate-900 sm:text-3xl">Welcome back, {{ $user->name }}</h1>
                        <p class="mt-1 text-sm text-slate-500">Manage bookings, payments, and upcoming events.</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('bookings.create') }}" class="inline-flex items-center justify-center rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">
                            New Booking
                        </a>
                        <a href="{{ route('bookings.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                            View Bookings
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stat Cards -->
            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-slate-500">Total bookings</p>
                            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $totalBookings }}</p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                            B
                        </div>
                    </div>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-slate-500">Confirmed events</p>
                            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $confirmedBookings }}</p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 text-amber-700">
                            C
                        </div>
                    </div>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-slate-500">Upcoming events</p>
                            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $upcomingBookings }}</p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-100 text-sky-700">
                            U
                        </div>
                    </div>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-slate-500">Total spent</p>
                            <p class="mt-2 text-2xl font-semibold text-slate-900">${{ number_format($totalSpent, 2) }}</p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                            $
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 grid gap-6 lg:grid-cols-[minmax(0,1.4fr)_minmax(0,1fr)]">
                <!-- Recent bookings -->
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-slate-900">Recent bookings</h2>
                        <a href="{{ route('bookings.index') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800">View all</a>
                    </div>

                    <div class="mt-5 divide-y divide-slate-100">
                        @if($recentBookings->isNotEmpty())
                            @foreach($recentBookings as $booking)
                                <div class="flex flex-col gap-3 py-4 sm:flex-row sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">{{ $booking->event_name }}</p>
                                        <p class="text-xs text-slate-500">{{ $booking->event_date->format('M d, Y') }} • {{ $booking->package->name }}</p>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="rounded-full px-2.5 py-1 text-xs font-semibold
                                            @if($booking->status === 'pending') bg-amber-100 text-amber-700
                                            @elseif($booking->status === 'confirmed') bg-emerald-100 text-emerald-700
                                            @elseif($booking->status === 'cancelled') bg-rose-100 text-rose-700
                                            @else bg-sky-100 text-sky-700
                                            @endif">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                        <a href="{{ route('bookings.show', $booking) }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900">Details</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="rounded-xl border border-dashed border-slate-200 p-6 text-center text-sm text-slate-500">
                                No bookings yet. Create your first event booking today.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="space-y-6">
                    <!-- Spotlight -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="text-lg font-semibold text-slate-900">Quick overview</h2>
                        <p class="mt-2 text-sm text-slate-500">Track what matters most for your upcoming events.</p>

                        <div class="mt-6 space-y-4">
                            <div class="rounded-xl border border-emerald-100 bg-emerald-50/60 p-4">
                                <p class="text-xs uppercase tracking-wide text-emerald-700">Next action</p>
                                <p class="mt-1 text-sm font-semibold text-slate-900">Confirm pending bookings</p>
                                <p class="mt-2 text-xs text-slate-500">Pending bookings can be edited until payment.</p>
                                <a href="{{ route('bookings.index') }}" class="mt-3 inline-flex text-xs font-semibold text-emerald-700 hover:text-emerald-800">Review pending</a>
                            </div>

                            <div class="rounded-xl border border-amber-100 bg-amber-50/60 p-4">
                                <p class="text-xs uppercase tracking-wide text-amber-700">Payments</p>
                                <p class="mt-1 text-sm font-semibold text-slate-900">View payment history</p>
                                <p class="mt-2 text-xs text-slate-500">See completed and refunded transactions.</p>
                                <a href="{{ route('payments.history') }}" class="mt-3 inline-flex text-xs font-semibold text-amber-700 hover:text-amber-800">Go to payments</a>
                            </div>

                            <div class="rounded-xl border border-slate-200 bg-white p-4">
                                <p class="text-xs uppercase tracking-wide text-slate-500">Support</p>
                                <p class="mt-1 text-sm font-semibold text-slate-900">Need help with your booking?</p>
                                <p class="mt-2 text-xs text-slate-500">Our team responds within 24 hours.</p>
                                <a href="{{ route('contact') }}" class="mt-3 inline-flex text-xs font-semibold text-slate-700 hover:text-slate-900">Contact support</a>
                            </div>
                        </div>
                    </div>

                    <!-- Profile card -->
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-slate-900">Profile</h2>
                            <a href="{{ route('profile.edit') }}" class="text-xs font-semibold text-emerald-700 hover:text-emerald-800">Full profile</a>
                        </div>

                        <form method="post" action="{{ route('profile.update') }}" class="mt-4 space-y-4" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="flex items-center gap-4 rounded-xl border border-emerald-100 bg-emerald-50/50 p-4">
                                <div class="h-12 w-12 overflow-hidden rounded-full bg-white">
                                    @if ($user->avatar_path)
                                        <img src="{{ Storage::url($user->avatar_path) }}" alt="{{ $user->name }}" class="h-full w-full object-cover">
                                    @else
                                        <div class="flex h-full w-full items-center justify-center bg-emerald-100 text-emerald-700 font-semibold">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <label class="block text-xs font-semibold text-slate-600" for="dashboard_avatar">Update photo</label>
                                    <input id="dashboard_avatar" name="avatar" type="file" accept="image/png,image/jpeg,image/webp" class="mt-1 block w-full text-xs text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-emerald-600 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-white hover:file:bg-emerald-700">
                                    @error('avatar') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="space-y-3">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-600" for="dashboard_name">Name</label>
                                    <input id="dashboard_name" name="name" type="text" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-emerald-400" value="{{ old('name', $user->name) }}" required>
                                    @error('name') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-600" for="dashboard_email">Email</label>
                                    <input id="dashboard_email" name="email" type="email" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-emerald-400" value="{{ old('email', $user->email) }}" required>
                                    @error('email') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-600" for="dashboard_phone">Phone</label>
                                    <input id="dashboard_phone" name="phone" type="text" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-emerald-400" value="{{ old('phone', $user->phone) }}">
                                    @error('phone') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-600" for="dashboard_address">Address</label>
                                    <input id="dashboard_address" name="address_line" type="text" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-emerald-400" value="{{ old('address_line', $user->address_line) }}">
                                    @error('address_line') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-600" for="dashboard_city">City</label>
                                        <input id="dashboard_city" name="city" type="text" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-emerald-400" value="{{ old('city', $user->city) }}">
                                        @error('city') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-600" for="dashboard_country">Country</label>
                                        <input id="dashboard_country" name="country" type="text" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-emerald-400" value="{{ old('country', $user->country) }}">
                                        @error('country') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-600" for="dashboard_bio">Short Bio</label>
                                    <textarea id="dashboard_bio" name="bio" rows="3" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-emerald-400">{{ old('bio', $user->bio) }}</textarea>
                                    @error('bio') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="flex items-center justify-between gap-3">
                                <p class="text-xs text-slate-500">Update your profile quickly.</p>
                                <button type="submit" class="rounded-lg bg-emerald-600 px-4 py-2 text-xs font-semibold text-white hover:bg-emerald-700">Save</button>
                            </div>

                            @if (session('status') === 'profile-updated')
                                <p class="text-xs text-emerald-600">Profile updated.</p>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
