<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::query()
            ->with(['booking', 'user'])
            ->latest()
            ->paginate(15);

        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        $bookings = Booking::query()->orderByDesc('created_at')->get();
        $users = User::query()->orderBy('name')->get();

        return view('admin.payments.create', compact('bookings', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => ['required', 'exists:bookings,id'],
            'user_id' => ['required', 'exists:users,id'],
            'amount' => ['required', 'numeric', 'min:0'],
            'payment_method' => ['required', 'in:card,bank_transfer,wallet'],
            'status' => ['required', 'in:pending,completed,failed,refunded'],
            'transaction_id' => ['nullable', 'string', 'max:255'],
            'payment_gateway' => ['nullable', 'string', 'max:100'],
        ]);

        $payment = Payment::create([
            'booking_id' => $validated['booking_id'],
            'user_id' => $validated['user_id'],
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'status' => $validated['status'],
            'transaction_id' => $validated['transaction_id'] ?? null,
            'payment_gateway' => $validated['payment_gateway'] ?? 'manual',
        ]);

        $this->syncBookingStatus($payment);

        return redirect()->route('admin.payments.show', $payment)->with('success', 'Payment created successfully.');
    }

    public function show(Payment $payment)
    {
        $payment->load(['booking', 'user']);

        return view('admin.payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $bookings = Booking::query()->orderByDesc('created_at')->get();
        $users = User::query()->orderBy('name')->get();

        return view('admin.payments.edit', compact('payment', 'bookings', 'users'));
    }

    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'booking_id' => ['required', 'exists:bookings,id'],
            'user_id' => ['required', 'exists:users,id'],
            'amount' => ['required', 'numeric', 'min:0'],
            'payment_method' => ['required', 'in:card,bank_transfer,wallet'],
            'status' => ['required', 'in:pending,completed,failed,refunded'],
            'transaction_id' => ['nullable', 'string', 'max:255'],
            'payment_gateway' => ['nullable', 'string', 'max:100'],
        ]);

        $payment->update([
            'booking_id' => $validated['booking_id'],
            'user_id' => $validated['user_id'],
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'status' => $validated['status'],
            'transaction_id' => $validated['transaction_id'] ?? null,
            'payment_gateway' => $validated['payment_gateway'] ?? $payment->payment_gateway,
        ]);

        $this->syncBookingStatus($payment);

        return redirect()->route('admin.payments.show', $payment)->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('admin.payments.index')->with('success', 'Payment deleted successfully.');
    }

    public function syncBooking(Payment $payment)
    {
        $this->syncBookingStatus($payment);

        return redirect()->route('admin.payments.index')->with('success', 'Booking status synced successfully.');
    }

    private function syncBookingStatus(Payment $payment): void
    {
        $booking = $payment->booking;
        if (! $booking) {
            return;
        }

        $booking->update([
            'status' => Payment::mapBookingStatus($payment->status),
        ]);
    }
}
