<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::query()
            ->with(['user', 'package'])
            ->latest()
            ->paginate(15);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $users = User::query()->orderBy('name')->get();
        $packages = Package::query()->orderBy('name')->get();

        return view('admin.bookings.create', compact('users', 'packages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'package_id' => ['required', 'exists:packages,id'],
            'event_name' => ['required', 'string', 'max:255'],
            'event_date' => ['required', 'date'],
            'location' => ['required', 'string', 'max:255'],
            'guest_count' => ['required', 'integer', 'min:1'],
            'special_requirements' => ['nullable', 'string'],
            'total_price' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:pending,confirmed,completed,cancelled'],
        ]);

        $booking = Booking::create($validated);

        return redirect()->route('admin.bookings.show', $booking)->with('success', 'Booking created successfully.');
    }

    public function show(Booking $booking)
    {
        $booking->load(['user', 'package', 'payment']);

        return view('admin.bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $users = User::query()->orderBy('name')->get();
        $packages = Package::query()->orderBy('name')->get();

        return view('admin.bookings.edit', compact('booking', 'users', 'packages'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'package_id' => ['required', 'exists:packages,id'],
            'event_name' => ['required', 'string', 'max:255'],
            'event_date' => ['required', 'date'],
            'location' => ['required', 'string', 'max:255'],
            'guest_count' => ['required', 'integer', 'min:1'],
            'special_requirements' => ['nullable', 'string'],
            'total_price' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:pending,confirmed,completed,cancelled'],
        ]);

        $booking->update($validated);

        return redirect()->route('admin.bookings.show', $booking)->with('success', 'Booking updated successfully.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
