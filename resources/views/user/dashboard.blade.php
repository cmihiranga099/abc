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
            </div>
        </section>
    </div>
</div>
@endsection
