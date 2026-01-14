<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomizationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'service' => ['required', 'string', 'in:Wedding Planning,Corporate Events,Birthday Parties,Concerts'],
            'event_name' => ['required', 'string', 'max:255'],
            'event_date' => ['required', 'date', 'after:today'],
            'location' => ['required', 'string', 'max:255'],
            'guest_count' => ['required', 'integer', 'min:10', 'max:500'],
            'duration' => ['required', 'integer', 'min:2', 'max:12'],
            'venue' => ['required', 'in:indoor,outdoor'],
            'addons' => ['nullable', 'string'],
        ]);

        $package = $this->resolvePackage($validated['service']);
        if (! $package) {
            return redirect()->route('customize', ['service' => $validated['service']])
                ->with('error', 'No active package available for this service.');
        }

        $addons = $this->parseAddons($validated['addons'] ?? '');
        $totalPrice = $this->calculateTotal(
            $validated['service'],
            (int) $validated['guest_count'],
            (int) $validated['duration'],
            $validated['venue'],
            $addons
        );

        $notes = array_filter([
            "Service: {$validated['service']}",
            "Guests: {$validated['guest_count']}",
            "Duration: {$validated['duration']} hours",
            "Venue: {$validated['venue']}",
            $addons ? 'Add-ons: ' . implode(', ', $addons) : null,
            'Estimated total: $' . number_format($totalPrice, 0),
        ]);

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'package_id' => $package->id,
            'event_name' => $validated['event_name'],
            'event_date' => $validated['event_date'],
            'location' => $validated['location'],
            'guest_count' => $validated['guest_count'],
            'special_requirements' => implode("\n", $notes),
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()->route('payments.create', $booking);
    }

    private function resolvePackage(string $service): ?Package
    {
        $serviceKeywords = [
            'Wedding Planning' => 'wedding',
            'Corporate Events' => 'corporate',
            'Birthday Parties' => 'birthday',
            'Concerts' => 'concert',
        ];

        $keyword = $serviceKeywords[$service] ?? null;

        $query = Package::query()->where('is_active', true);
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        return $query->first() ?? Package::where('is_active', true)->first();
    }

    private function parseAddons(string $addons): array
    {
        if (! $addons) {
            return [];
        }

        $items = array_filter(array_map('trim', explode(',', $addons)));

        return $items;
    }

    private function calculateTotal(string $service, int $guests, int $duration, string $venue, array $addons): float
    {
        $pricing = [
            'Wedding Planning' => ['base' => 2000, 'per_guest' => 45],
            'Corporate Events' => ['base' => 1800, 'per_guest' => 40],
            'Birthday Parties' => ['base' => 800, 'per_guest' => 20],
            'Concerts' => ['base' => 3000, 'per_guest' => 55],
        ];

        $base = $pricing[$service]['base'] ?? 0;
        $perGuest = $pricing[$service]['per_guest'] ?? 0;
        $guestSubtotal = $guests * $perGuest;
        $extraHours = max(0, $duration - 4);
        $durationSubtotal = $extraHours * 150;

        $addonSubtotal = 0;
        if (in_array('Photography', $addons, true)) {
            $addonSubtotal += 500;
        }
        if (in_array('Videography', $addons, true)) {
            $addonSubtotal += 800;
        }
        if (in_array('DJ & Sound', $addons, true)) {
            $addonSubtotal += 600;
        }
        if (in_array('Catering', $addons, true)) {
            $addonSubtotal += $guests * 25;
        }

        $venueSubtotal = $venue === 'outdoor' ? round(($base + $guestSubtotal) * 0.1) : 0;

        return $base + $guestSubtotal + $durationSubtotal + $addonSubtotal + $venueSubtotal;
    }
}
