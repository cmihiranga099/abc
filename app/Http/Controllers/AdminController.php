<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $metrics = [
            'users' => User::count(),
            'packages' => Package::count(),
            'bookings' => Booking::count(),
            'payments' => Payment::count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'pending_payments' => Payment::where('status', 'pending')->count(),
        ];

        $recentBookings = Booking::with(['user', 'package'])
            ->latest()
            ->take(5)
            ->get();

        $recentPayments = Payment::with(['user', 'booking'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('metrics', 'recentBookings', 'recentPayments'));
    }

    public function syncBookingStatuses()
    {
        $payments = Payment::with('booking')->get();

        foreach ($payments as $payment) {
            if (! $payment->booking) {
                continue;
            }

            $payment->booking->update([
                'status' => Payment::mapBookingStatus($payment->status),
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Booking statuses synced from payments.');
    }
}
