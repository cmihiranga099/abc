<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show payment form
    public function create(Booking $booking)
    {
        $this->authorize('view', $booking);

        if ($booking->status !== 'pending') {
            return redirect()->route('bookings.show', $booking)->with('error', 'This booking cannot be paid');
        }

        return view('customer.payments.create', compact('booking'));
    }

    // Process payment (dummy payment gateway)
    public function store(Request $request, Booking $booking)
    {
        $this->authorize('view', $booking);

        $validated = $request->validate([
            'payment_method' => 'required|in:card,bank_transfer,wallet',
            'cardholder_name' => 'required_if:payment_method,card|string',
            'card_number' => 'required_if:payment_method,card|regex:/^\d{16}$/',
            'expiry_date' => 'required_if:payment_method,card|regex:/^\d{2}\/\d{2}$/',
            'cvv' => 'required_if:payment_method,card|regex:/^\d{3}$/',
        ]);

        // Create dummy payment
        $transactionId = 'TXN-' . date('YmdHis') . '-' . rand(1000, 9999);

        $payment = Payment::create([
            'booking_id' => $booking->id,
            'user_id' => Auth::id(),
            'amount' => $booking->total_price,
            'payment_method' => $validated['payment_method'],
            'status' => 'completed', // Dummy: Auto-approve all payments
            'transaction_id' => $transactionId,
            'payment_gateway' => 'dummy',
            'payment_data' => [
                'method' => $validated['payment_method'],
                'card_last_four' => $validated['payment_method'] === 'card' ? substr($validated['card_number'], -4) : null,
                'timestamp' => now(),
            ],
        ]);

        // Update booking status to confirmed
        $booking->update(['status' => 'confirmed']);

        return redirect()->route('bookings.show', $booking)->with('success', 'Payment successful! Your booking is confirmed.');
    }

    // Show payment history
    public function history()
    {
        $payments = Auth::user()->payments()->latest()->get();
        return view('customer.payments.history', compact('payments'));
    }

    // Refund payment
    public function refund(Payment $payment)
    {
        $this->authorize('refund', $payment);

        if ($payment->status !== 'completed') {
            return back()->with('error', 'Only completed payments can be refunded');
        }

        $booking = $payment->booking;

        if (!in_array($booking->status, ['confirmed'])) {
            return back()->with('error', 'Cannot refund this booking');
        }

        // Update payment status
        $payment->update(['status' => 'refunded']);
        $booking->update(['status' => 'cancelled']);

        return back()->with('success', 'Refund processed successfully!');
    }
}
