@extends('layouts.app')

@section('title', 'Edit Payment - EventPro')

@section('content')
<section class="min-h-screen bg-slate-50 py-8">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-slate-900">Edit Payment</h1>
            <p class="text-sm text-slate-500">Update payment details.</p>
        </div>

        <form action="{{ route('admin.payments.update', $payment) }}" method="POST" class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            @csrf
            @method('PUT')

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-medium text-slate-700">Booking</label>
                    <select name="booking_id" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                        @foreach($bookings as $booking)
                            <option value="{{ $booking->id }}" @selected(old('booking_id', $payment->booking_id) == $booking->id)>#{{ $booking->id }} - {{ $booking->event_name }}</option>
                        @endforeach
                    </select>
                    @error('booking_id') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Customer</label>
                    <select name="user_id" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" @selected(old('user_id', $payment->user_id) == $user->id)>{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                    @error('user_id') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Amount</label>
                    <input type="number" step="0.01" name="amount" value="{{ old('amount', $payment->amount) }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                    @error('amount') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Status</label>
                    <select name="status" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                        @foreach(['pending', 'completed', 'failed', 'refunded'] as $status)
                            <option value="{{ $status }}" @selected(old('status', $payment->status) === $status)>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                    @error('status') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Payment Method</label>
                    <select name="payment_method" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                        @foreach(['card', 'bank_transfer', 'wallet'] as $method)
                            <option value="{{ $method }}" @selected(old('payment_method', $payment->payment_method) === $method)>{{ ucfirst(str_replace('_', ' ', $method)) }}</option>
                        @endforeach
                    </select>
                    @error('payment_method') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Transaction ID</label>
                    <input type="text" name="transaction_id" value="{{ old('transaction_id', $payment->transaction_id) }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
                    @error('transaction_id') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div class="sm:col-span-2">
                    <label class="text-sm font-medium text-slate-700">Payment Gateway</label>
                    <input type="text" name="payment_gateway" value="{{ old('payment_gateway', $payment->payment_gateway) }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
                    @error('payment_gateway') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <a href="{{ route('admin.payments.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700">Cancel</a>
                <button type="submit" class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">Save Changes</button>
            </div>
        </form>
    </div>
</section>
@endsection
