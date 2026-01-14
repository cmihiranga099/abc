@extends('layouts.app')

@section('title', 'Booking Details - EventPro')

@section('content')
<section class="min-h-screen bg-slate-50 py-8">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-slate-900">{{ $booking->event_name }}</h1>
                <p class="text-sm text-slate-500">Booking #{{ $booking->id }}</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.bookings.edit', $booking) }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700">Edit</a>
                <a href="{{ route('admin.bookings.index') }}" class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">Back</a>
            </div>
        </div>

        <div class="mt-6 grid gap-6 lg:grid-cols-2">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Booking</h2>
                <div class="mt-4 space-y-2 text-sm text-slate-600">
                    <p><span class="font-semibold text-slate-900">Customer:</span> {{ $booking->user?->name ?? 'Unknown' }}</p>
                    <p><span class="font-semibold text-slate-900">Package:</span> {{ $booking->package?->name ?? '—' }}</p>
                    <p><span class="font-semibold text-slate-900">Date:</span> {{ $booking->event_date->format('M d, Y') }}</p>
                    <p><span class="font-semibold text-slate-900">Location:</span> {{ $booking->location }}</p>
                    <p><span class="font-semibold text-slate-900">Guests:</span> {{ $booking->guest_count }}</p>
                    <p><span class="font-semibold text-slate-900">Status:</span> {{ ucfirst($booking->status) }}</p>
                    <p><span class="font-semibold text-slate-900">Total:</span> ${{ number_format($booking->total_price, 2) }}</p>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Payment</h2>
                @if($booking->payment)
                    <div class="mt-4 space-y-2 text-sm text-slate-600">
                        <p><span class="font-semibold text-slate-900">Status:</span> {{ ucfirst($booking->payment->status) }}</p>
                        <p><span class="font-semibold text-slate-900">Amount:</span> ${{ number_format($booking->payment->amount, 2) }}</p>
                        <p><span class="font-semibold text-slate-900">Method:</span> {{ $booking->payment->payment_method }}</p>
                        <p><span class="font-semibold text-slate-900">Transaction:</span> {{ $booking->payment->transaction_id ?? '—' }}</p>
                    </div>
                @else
                    <p class="mt-4 text-sm text-slate-500">No payment recorded.</p>
                @endif
            </div>
        </div>

        <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900">Special Requirements</h2>
            <p class="mt-4 text-sm text-slate-600">{{ $booking->special_requirements ?? 'None.' }}</p>
        </div>
    </div>
</section>
@endsection
