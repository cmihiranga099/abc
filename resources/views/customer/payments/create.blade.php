@extends('layouts.app')

@section('title', 'Payment Checkout - EventPro')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-cyan-50 to-slate-50 py-8 sm:py-12">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('bookings.show', $booking->id) }}" class="text-cyan-600 hover:text-cyan-800 font-medium">← Back to Booking</a>
            <h1 class="text-3xl sm:text-4xl font-bold mt-4 mb-2">Complete Payment</h1>
            <p class="text-gray-600">Secure payment for your event booking</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Payment Form -->
            <div class="md:col-span-2">
                <form action="{{ route('payments.store', $booking->id) }}" method="POST" class="bg-white rounded-lg shadow-lg p-6 sm:p-8">
                    @csrf

                    <!-- Payment Method Selection -->
                    <div class="mb-8">
                        <h2 class="text-lg font-bold text-gray-800 mb-4">💳 Payment Method</h2>
                        <div class="space-y-3">
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-cyan-300 hover:bg-cyan-50 peer-checked:border-cyan-600 peer-checked:bg-cyan-50">
                                <input type="radio" name="payment_method" value="card" class="hidden peer" required {{ old('payment_method') === 'card' ? 'checked' : '' }}>
                                <span class="text-xl mr-3">💳</span>
                                <div>
                                    <p class="font-bold">Credit/Debit Card</p>
                                    <p class="text-xs text-gray-600">Visa, Mastercard, Amex</p>
                                </div>
                            </label>

                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-cyan-300 hover:bg-cyan-50 peer-checked:border-cyan-600 peer-checked:bg-cyan-50">
                                <input type="radio" name="payment_method" value="bank_transfer" class="hidden peer" {{ old('payment_method') === 'bank_transfer' ? 'checked' : '' }}>
                                <span class="text-xl mr-3">🏦</span>
                                <div>
                                    <p class="font-bold">Bank Transfer</p>
                                    <p class="text-xs text-gray-600">Direct bank account transfer</p>
                                </div>
                            </label>

                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-cyan-300 hover:bg-cyan-50 peer-checked:border-cyan-600 peer-checked:bg-cyan-50">
                                <input type="radio" name="payment_method" value="wallet" class="hidden peer" {{ old('payment_method') === 'wallet' ? 'checked' : '' }}>
                                <span class="text-xl mr-3">👛</span>
                                <div>
                                    <p class="font-bold">Digital Wallet</p>
                                    <p class="text-xs text-gray-600">PayPal or similar services</p>
                                </div>
                            </label>
                        </div>
                        @error('payment_method') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                    </div>

                    <!-- Card Payment Fields (shown when card is selected) -->
                    <div id="cardFields" class="mb-8 pb-8 border-b hidden">
                        <h3 class="text-base font-bold text-gray-800 mb-4">Card Details</h3>

                        <!-- Cardholder Name -->
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Cardholder Name</label>
                            <input type="text" name="cardholder_name" value="{{ old('cardholder_name', auth()->user()->name) }}" placeholder="John Doe" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            @error('cardholder_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Card Number -->
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Card Number</label>
                            <input type="text" name="card_number" value="{{ old('card_number') }}" placeholder="1234 5678 9012 3456" maxlength="19" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" inputmode="numeric">
                            @error('card_number') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Expiry & CVV -->
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Expiry Date</label>
                                <input type="text" name="expiry_date" value="{{ old('expiry_date') }}" placeholder="MM/YY" maxlength="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                @error('expiry_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">CVV</label>
                                <input type="text" name="cvv" value="{{ old('cvv') }}" placeholder="123" maxlength="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" inputmode="numeric">
                                @error('cvv') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Security Notice -->
                    <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-8">
                        <p class="text-sm text-green-800">
                            🔒 <strong>Secure Payment:</strong> This is a demo environment. All payments are processed securely and will auto-complete for testing purposes.
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition font-bold text-lg">
                        Complete Payment - ${{ number_format($booking->total_price, 2) }}
                    </button>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 sticky top-8">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Order Summary</h3>

                    <!-- Event Info -->
                    <div class="mb-4 pb-4 border-b">
                        <p class="text-xs text-gray-600 mb-1">Event</p>
                        <p class="font-bold text-gray-900">{{ $booking->event_name }}</p>
                        <p class="text-xs text-gray-600 mt-2">📅 {{ $booking->event_date->format('M j, Y') }}</p>
                    </div>

                    <!-- Package Info -->
                    <div class="mb-4 pb-4 border-b">
                        <p class="text-xs text-gray-600 mb-1">Package</p>
                        <p class="font-bold text-gray-900">{{ $booking->package->name }}</p>
                        <p class="text-xs text-gray-600 mt-2">👥 {{ $booking->guest_count }} guests</p>
                    </div>

                    <!-- Pricing -->
                    <div class="space-y-2 mb-4 pb-4 border-b">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-bold">${{ number_format($booking->total_price, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Tax & Fees</span>
                            <span class="font-bold">$0.00</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-lg font-bold text-gray-900">Total Amount</span>
                        <span class="text-2xl font-bold text-cyan-600">${{ number_format($booking->total_price, 2) }}</span>
                    </div>

                    <!-- Additional Info -->
                    <div class="bg-gray-50 rounded-lg p-4 text-xs text-gray-600 text-center">
                        <p>✓ Secure & Encrypted</p>
                        <p>✓ Money-back guarantee</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Show/hide card fields based on payment method selection
    const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
    const cardFields = document.getElementById('cardFields');

    paymentMethods.forEach(method => {
        method.addEventListener('change', function() {
            cardFields.classList.toggle('hidden', this.value !== 'card');
        });
    });

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        const selectedMethod = document.querySelector('input[name="payment_method"]:checked');
        if (selectedMethod && selectedMethod.value === 'card') {
            cardFields.classList.remove('hidden');
        }
    });

    // Format card number with spaces
    document.querySelector('input[name="card_number"]')?.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\s+/g, '');
        let formatted = value.replace(/(\d{4})/g, '$1 ').trim();
        e.target.value = formatted;
    });

    // Format expiry date
    document.querySelector('input[name="expiry_date"]')?.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length >= 2) {
            value = value.slice(0, 2) + '/' + value.slice(2, 4);
        }
        e.target.value = value;
    });
</script>
@endsection
