<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Http\Request;
use Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Customer bookings list
    public function index()
    {
        $bookings = Auth::user()->bookings()->with('package')->latest()->get();
        return view('customer.bookings.index', compact('bookings'));
    }

    // Create new booking (select package)
    public function create()
    {
        $packages = Package::where('is_active', true)->get();
        return view('customer.bookings.create', compact('packages'));
    }

    // Store booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date|after:today',
            'location' => 'required|string|max:255',
            'guest_count' => 'required|integer|min:10|max:500',
            'special_requirements' => 'nullable|string',
        ]);

        $package = Package::findOrFail($request->package_id);

        $booking = Auth::user()->bookings()->create([
            'package_id' => $package->id,
            'event_name' => $validated['event_name'],
            'event_date' => $validated['event_date'],
            'location' => $validated['location'],
            'guest_count' => $validated['guest_count'],
            'special_requirements' => $validated['special_requirements'] ?? null,
            'total_price' => $package->price,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.show', $booking)->with('success', 'Booking created successfully!');
    }

    // Show booking details
    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);
        return view('customer.bookings.show', compact('booking'));
    }

    // Edit booking
    public function edit(Booking $booking)
    {
        $this->authorize('update', $booking);
        
        // Can only edit pending bookings
        if ($booking->status !== 'pending') {
            return redirect()->route('bookings.show', $booking)->with('error', 'Cannot edit this booking');
        }

        $packages = Package::where('is_active', true)->get();
        return view('customer.bookings.edit', compact('booking', 'packages'));
    }

    // Update booking
    public function update(Request $request, Booking $booking)
    {
        $this->authorize('update', $booking);

        if ($booking->status !== 'pending') {
            return redirect()->route('bookings.show', $booking)->with('error', 'Cannot edit this booking');
        }

        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date|after:today',
            'location' => 'required|string|max:255',
            'guest_count' => 'required|integer|min:10|max:500',
            'special_requirements' => 'nullable|string',
        ]);

        $package = Package::findOrFail($request->package_id);

        $booking->update([
            'package_id' => $package->id,
            'event_name' => $validated['event_name'],
            'event_date' => $validated['event_date'],
            'location' => $validated['location'],
            'guest_count' => $validated['guest_count'],
            'special_requirements' => $validated['special_requirements'] ?? null,
            'total_price' => $package->price,
        ]);

        return redirect()->route('bookings.show', $booking)->with('success', 'Booking updated successfully!');
    }

    // Delete booking
    public function destroy(Booking $booking)
    {
        $this->authorize('delete', $booking);

        if ($booking->status !== 'pending') {
            return redirect()->route('bookings.show', $booking)->with('error', 'Cannot delete this booking');
        }

        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking cancelled successfully!');
    }
}
