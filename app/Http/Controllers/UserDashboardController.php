<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $totalBookings = $user->bookings()->count();
        $confirmedBookings = $user->bookings()->where('status', 'confirmed')->count();
        $upcomingBookings = $user->bookings()->whereDate('event_date', '>=', now())->count();
        $totalSpent = $user->payments()->where('status', 'completed')->sum('amount');
        $recentBookings = $user->bookings()->with('package')->latest()->take(5)->get();

        return view('user.dashboard', [
            'user' => $user,
            'totalBookings' => $totalBookings,
            'confirmedBookings' => $confirmedBookings,
            'upcomingBookings' => $upcomingBookings,
            'totalSpent' => $totalSpent,
            'recentBookings' => $recentBookings,
        ]);
    }
}
