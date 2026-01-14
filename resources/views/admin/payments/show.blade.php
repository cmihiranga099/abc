@extends('layouts.app')

@section('title', 'Payment Details - EventPro')

@section('content')
<section class="min-h-screen bg-slate-50 py-8">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-slate-900">Payment #{{ $payment->id }}</h1>
                <p class="text-sm text-slate-500">Booking #{{ $payment->booking_id }}</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.payments.edit', $payment) }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700">Edit</a>
                <a href="{{ route('admin.payments.index') }}" class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">Back</a>
            </div>
        </div>

        <div class="mt-6 grid gap-6 lg:grid-cols-2">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Payment</h2>
                <div class="mt-4 space-y-2 text-sm text-slate-600">
                    <p><span class="font-semibold text-slate-900">Amount:</span> ${{ number_format($payment->amount, 2) }}</p>
                    <p><span class="font-semibold text-slate-900">Status:</span> {{ ucfirst($payment->status) }}</p>
                    <p><span class="font-semibold text-slate-900">Method:</span> {{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}</p>
                    <p><span class="font-semibold text-slate-900">Gateway:</span> {{ $payment->payment_gateway }}</p>
                    <p><span class="font-semibold text-slate-900">Transaction:</span> {{ $payment->transaction_id ?? '—' }}</p>
                    <p><span class="font-semibold text-slate-900">Created:</span> {{ $payment->created_at->format('M d, Y g:i A') }}</p>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Customer</h2>
                <div class="mt-4 space-y-2 text-sm text-slate-600">
                    <p><span class="font-semibold text-slate-900">Name:</span> {{ $payment->user?->name ?? 'Unknown' }}</p>
                    <p><span class="font-semibold text-slate-900">Email:</span> {{ $payment->user?->email ?? '—' }}</p>
                </div>
                <div class="mt-6">
                    <h2 class="text-lg font-semibold text-slate-900">Booking</h2>
                    <div class="mt-4 space-y-2 text-sm text-slate-600">
                        <p><span class="font-semibold text-slate-900">Event:</span> {{ $payment->booking?->event_name ?? '—' }}</p>
                        <p><span class="font-semibold text-slate-900">Status:</span> {{ $payment->booking?->status ? ucfirst($payment->booking->status) : '—' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
