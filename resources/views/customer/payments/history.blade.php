@extends('layouts.app')

@section('title', 'Payment History - EventPro')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-slate-50 py-8 sm:py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('bookings.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">← Back to Bookings</a>
            <h1 class="text-3xl sm:text-4xl font-bold mt-4 mb-2">Payment History</h1>
            <p class="text-gray-600">View all your transactions and payment records</p>
        </div>

        <!-- Summary Cards -->
        @if($payments->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                <!-- Total Spent -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg shadow-lg p-6">
                    <p class="text-white/80 text-sm mb-1">💰 Total Spent</p>
                    <p class="text-3xl font-bold">${{ number_format($payments->where('status', 'completed')->sum('amount'), 2) }}</p>
                </div>

                <!-- Total Transactions -->
                <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 text-white rounded-lg shadow-lg p-6">
                    <p class="text-white/80 text-sm mb-1">📊 Total Payments</p>
                    <p class="text-3xl font-bold">{{ $payments->count() }}</p>
                </div>

                <!-- Refunded -->
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 text-white rounded-lg shadow-lg p-6">
                    <p class="text-white/80 text-sm mb-1">🔄 Refunded</p>
                    <p class="text-3xl font-bold">${{ number_format($payments->where('status', 'refunded')->sum('amount'), 2) }}</p>
                </div>
            </div>
        @endif

        <!-- Payments Table -->
        @if($payments->count() > 0)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Desktop View -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100 border-b-2 border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Event Name</th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Amount</th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Method</th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Status</th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Date</th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                                <tr class="border-b hover:bg-gray-50 transition">
                                    <td class="px-6 py-4">
                                        <p class="font-bold text-gray-900">{{ $payment->booking->event_name }}</p>
                                        <p class="text-xs text-gray-600">TXN-{{ $payment->transaction_id }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="font-bold text-gray-900">${{ number_format($payment->amount, 2) }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-sm text-gray-700">
                                            @if($payment->payment_method === 'card')
                                                💳 Card
                                            @elseif($payment->payment_method === 'bank_transfer')
                                                🏦 Bank Transfer
                                            @else
                                                👛 Wallet
                                            @endif
                                        </p>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($payment->status === 'completed')
                                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">✓ Completed</span>
                                        @elseif($payment->status === 'pending')
                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-full">⏳ Pending</span>
                                        @elseif($payment->status === 'failed')
                                            <span class="px-3 py-1 bg-red-100 text-red-800 text-xs font-bold rounded-full">✗ Failed</span>
                                        @else
                                            <span class="px-3 py-1 bg-orange-100 text-orange-800 text-xs font-bold rounded-full">🔄 Refunded</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-sm text-gray-700">{{ $payment->created_at->format('M j, Y') }}</p>
                                        <p class="text-xs text-gray-600">{{ $payment->created_at->format('g:i A') }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('bookings.show', $payment->booking->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">
                                            View
                                        </a>
                                        @if($payment->status === 'completed')
                                            <form action="{{ route('payments.refund', $payment->id) }}" method="POST" class="inline" onsubmit="return confirm('Request a refund for this payment?')">
                                                @csrf @method('POST')
                                                <button type="submit" class="text-orange-600 hover:text-orange-800 font-medium text-sm ml-4">
                                                    Refund
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Mobile View -->
                <div class="md:hidden space-y-4 p-4">
                    @foreach($payments as $payment)
                        <div class="border rounded-lg p-4 hover:shadow-md transition">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <p class="font-bold text-gray-900">{{ $payment->booking->event_name }}</p>
                                    <p class="text-xs text-gray-600 mt-1">{{ $payment->created_at->format('M j, Y g:i A') }}</p>
                                </div>
                                @if($payment->status === 'completed')
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">✓</span>
                                @elseif($payment->status === 'pending')
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-full">⏳</span>
                                @elseif($payment->status === 'failed')
                                    <span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-bold rounded-full">✗</span>
                                @else
                                    <span class="px-2 py-1 bg-orange-100 text-orange-800 text-xs font-bold rounded-full">🔄</span>
                                @endif
                            </div>

                            <div class="grid grid-cols-2 gap-3 mb-3 pb-3 border-b text-sm">
                                <div>
                                    <p class="text-gray-600 text-xs">Amount</p>
                                    <p class="font-bold text-gray-900">${{ number_format($payment->amount, 2) }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-xs">Method</p>
                                    <p class="font-bold text-gray-900">
                                        @if($payment->payment_method === 'card')
                                            💳 Card
                                        @elseif($payment->payment_method === 'bank_transfer')
                                            🏦 Bank
                                        @else
                                            👛 Wallet
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <a href="{{ route('bookings.show', $payment->booking->id) }}" class="flex-1 px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded text-center hover:bg-blue-700 transition">
                                    View
                                </a>
                                @if($payment->status === 'completed')
                                    <form action="{{ route('payments.refund', $payment->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Request a refund for this payment?')">
                                        @csrf @method('POST')
                                        <button type="submit" class="w-full px-3 py-2 bg-orange-600 text-white text-sm font-medium rounded hover:bg-orange-700 transition">
                                            Refund
                                        </button>
                                    </form>
                                @endif
                            </div>

                            <p class="text-xs text-gray-600 mt-2">TXN-{{ $payment->transaction_id }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-lg shadow-lg p-8 sm:p-12 text-center">
                <p class="text-5xl mb-4">📭</p>
                <h3 class="text-xl font-bold text-gray-800 mb-2">No Payments Yet</h3>
                <p class="text-gray-600 mb-6">You haven't made any payments yet. Create your first booking to get started!</p>
                <a href="{{ route('bookings.create') }}" class="inline-block px-6 py-2.5 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-lg hover:shadow-lg transition font-bold">
                    Create Your First Booking
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
