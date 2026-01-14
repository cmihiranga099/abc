@extends('layouts.app')

@section('title', 'Admin Dashboard - EventPro')

@section('content')
<section class="min-h-screen bg-slate-50 py-8 sm:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold">Admin Dashboard</h1>
                <p class="text-sm text-slate-500 mt-1">Manage bookings, payments, users, and packages.</p>
            </div>
            <form method="POST" action="{{ route('admin.payments.sync-bookings') }}">
                @csrf
                <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">
                    Sync Booking Statuses
                </button>
            </form>
        </div>

        @if(session('success'))
            <div class="mt-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-xs uppercase tracking-wide text-slate-500">Users</p>
                <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $metrics['users'] }}</p>
                <a href="{{ route('admin.users.index') }}" class="mt-3 inline-flex text-xs font-semibold text-emerald-700 hover:text-emerald-800">Manage users</a>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-xs uppercase tracking-wide text-slate-500">Bookings</p>
                <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $metrics['bookings'] }}</p>
                <p class="mt-1 text-xs text-slate-500">Pending: {{ $metrics['pending_bookings'] }}</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-xs uppercase tracking-wide text-slate-500">Payments</p>
                <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $metrics['payments'] }}</p>
                <p class="mt-1 text-xs text-slate-500">Pending: {{ $metrics['pending_payments'] }}</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-xs uppercase tracking-wide text-slate-500">Packages</p>
                <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $metrics['packages'] }}</p>
                <a href="{{ route('admin.packages.index') }}" class="mt-3 inline-flex text-xs font-semibold text-emerald-700 hover:text-emerald-800">Manage packages</a>
            </div>
        </div>

        <div class="mt-6 grid gap-6 lg:grid-cols-2">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-slate-900">Recent bookings</h2>
                    <a href="{{ route('admin.bookings.index') }}" class="text-xs font-semibold text-emerald-700 hover:text-emerald-800">View all</a>
                </div>
                <div class="mt-4 space-y-3">
                    @forelse($recentBookings as $booking)
                        <div class="flex items-center justify-between text-sm">
                            <div>
                                <p class="font-semibold text-slate-900">{{ $booking->event_name }}</p>
                                <p class="text-xs text-slate-500">{{ $booking->user?->name ?? 'Unknown' }} · {{ $booking->event_date?->format('M d, Y') }}</p>
                            </div>
                            <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-700">{{ ucfirst($booking->status) }}</span>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">No bookings found.</p>
                    @endforelse
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-slate-900">Recent payments</h2>
                    <a href="{{ route('admin.payments.index') }}" class="text-xs font-semibold text-emerald-700 hover:text-emerald-800">View all</a>
                </div>
                <div class="mt-4 space-y-3">
                    @forelse($recentPayments as $payment)
                        <div class="flex items-center justify-between text-sm">
                            <div>
                                <p class="font-semibold text-slate-900">${{ number_format($payment->amount, 2) }}</p>
                                <p class="text-xs text-slate-500">{{ $payment->user?->name ?? 'Unknown' }} · {{ $payment->created_at->format('M d, Y') }}</p>
                            </div>
                            <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-700">{{ ucfirst($payment->status) }}</span>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">No payments found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
