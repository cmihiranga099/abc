@extends('layouts.app')

@section('title', 'Customize Your Event - EventPro')

@section('content')
<section class="relative bg-gradient-to-r from-slate-900 to-slate-700 text-white py-12 sm:py-16">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">Customize Your Event</h1>
        <p class="text-sm sm:text-base text-slate-200">Build your package and get an instant estimate.</p>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('error'))
            <div class="mb-6 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                {{ session('error') }}
            </div>
        @endif
        <form id="customizer" method="POST" action="{{ route('customize.book') }}">
            @csrf
            <div class="grid gap-6 lg:grid-cols-[minmax(0,1.2fr)_minmax(0,0.8fr)]">
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-6">
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Service Type</label>
                        <select id="serviceType" name="service" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
                            @php
                                $services = [
                                    'Wedding Planning',
                                    'Corporate Events',
                                    'Birthday Parties',
                                    'Concerts',
                                ];
                            @endphp
                            @foreach($services as $serviceOption)
                                <option value="{{ $serviceOption }}" @selected($serviceOption === $service)>{{ $serviceOption }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="text-sm font-semibold text-slate-700">Event Name</label>
                            <input id="eventName" name="event_name" type="text" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" placeholder="e.g., Wedding Celebration" required>
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-slate-700">Location</label>
                            <input id="eventLocation" name="location" type="text" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" placeholder="City, Venue" required>
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-slate-700">Guest Count</label>
                            <input id="guestCount" name="guest_count" type="number" min="10" max="500" value="80" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-slate-700">Event Date</label>
                            <input id="eventDate" name="event_date" type="date" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-slate-700">Duration (hours)</label>
                            <input id="durationHours" name="duration" type="number" min="2" max="12" value="4" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-slate-700">Venue Type</label>
                            <select id="venueType" name="venue" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
                                <option value="indoor">Indoor</option>
                                <option value="outdoor">Outdoor</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-slate-700 mb-3">Add-ons</p>
                        <div class="grid gap-3 sm:grid-cols-2">
                            <label class="flex items-center gap-3 rounded-lg border border-slate-200 px-3 py-2 text-sm text-slate-700">
                                <input type="checkbox" id="addonPhotography" class="h-4 w-4 rounded border-slate-300">
                                Photography (+$500)
                            </label>
                            <label class="flex items-center gap-3 rounded-lg border border-slate-200 px-3 py-2 text-sm text-slate-700">
                                <input type="checkbox" id="addonVideography" class="h-4 w-4 rounded border-slate-300">
                                Videography (+$800)
                            </label>
                            <label class="flex items-center gap-3 rounded-lg border border-slate-200 px-3 py-2 text-sm text-slate-700">
                                <input type="checkbox" id="addonDj" class="h-4 w-4 rounded border-slate-300">
                                DJ & Sound (+$600)
                            </label>
                            <label class="flex items-center gap-3 rounded-lg border border-slate-200 px-3 py-2 text-sm text-slate-700">
                                <input type="checkbox" id="addonCatering" class="h-4 w-4 rounded border-slate-300">
                                Catering (+$25 per guest)
                            </label>
                        </div>
                    </div>
                    <input type="hidden" id="addonsField" name="addons" value="">
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Estimated Total</h2>
                <p class="mt-1 text-xs text-slate-500">Includes base service, per-guest cost, add-ons, and venue/duration adjustments.</p>

                <div class="mt-6 space-y-3 text-sm text-slate-600">
                    <div class="flex items-center justify-between">
                        <span>Base service</span>
                        <span id="baseCost">$0</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>Guests</span>
                        <span id="guestCost">$0</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>Duration</span>
                        <span id="durationCost">$0</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>Venue</span>
                        <span id="venueCost">$0</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>Add-ons</span>
                        <span id="addonCost">$0</span>
                    </div>
                </div>

                <div class="mt-6 rounded-xl bg-slate-900 px-4 py-4 text-white">
                    <p class="text-xs uppercase tracking-wide text-slate-300">Estimated Total</p>
                    <p id="totalCost" class="mt-2 text-2xl font-semibold">$0</p>
                </div>

                <button type="submit" class="mt-6 inline-flex w-full items-center justify-center rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">
                    Book Now
                </button>
                <a href="{{ route('contact') }}" class="mt-3 inline-flex w-full items-center justify-center rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    Request a Custom Quote
                </a>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
(() => {
    const pricing = {
        "Wedding Planning": { base: 2000, perGuest: 45 },
        "Corporate Events": { base: 1800, perGuest: 40 },
        "Birthday Parties": { base: 800, perGuest: 20 },
        "Concerts": { base: 3000, perGuest: 55 },
    };

    const serviceType = document.getElementById('serviceType');
    const eventName = document.getElementById('eventName');
    const guestCount = document.getElementById('guestCount');
    const eventDate = document.getElementById('eventDate');
    const durationHours = document.getElementById('durationHours');
    const venueType = document.getElementById('venueType');
    const addonPhotography = document.getElementById('addonPhotography');
    const addonVideography = document.getElementById('addonVideography');
    const addonDj = document.getElementById('addonDj');
    const addonCatering = document.getElementById('addonCatering');

    const baseCost = document.getElementById('baseCost');
    const guestCost = document.getElementById('guestCost');
    const durationCost = document.getElementById('durationCost');
    const venueCost = document.getElementById('venueCost');
    const addonCost = document.getElementById('addonCost');
    const totalCost = document.getElementById('totalCost');
    const addonsField = document.getElementById('addonsField');

    const formatCurrency = (value) => `$${value.toLocaleString(undefined, { minimumFractionDigits: 0 })}`;

    const calculateTotal = () => {
        const service = serviceType.value;
        const guests = Math.max(10, parseInt(guestCount.value || '0', 10));
        const hours = Math.max(2, parseInt(durationHours.value || '0', 10));
        const base = pricing[service]?.base ?? 0;
        const perGuest = pricing[service]?.perGuest ?? 0;

        const guestSubtotal = guests * perGuest;
        const extraHours = Math.max(0, hours - 4);
        const durationSubtotal = extraHours * 150;
        const addonSubtotal =
            (addonPhotography.checked ? 500 : 0) +
            (addonVideography.checked ? 800 : 0) +
            (addonDj.checked ? 600 : 0) +
            (addonCatering.checked ? guests * 25 : 0);

        const venueMultiplier = venueType.value === 'outdoor' ? 0.1 : 0;
        const venueSubtotal = Math.round((base + guestSubtotal) * venueMultiplier);
        const total = base + guestSubtotal + durationSubtotal + addonSubtotal + venueSubtotal;

        baseCost.textContent = formatCurrency(base);
        guestCost.textContent = formatCurrency(guestSubtotal);
        durationCost.textContent = formatCurrency(durationSubtotal);
        addonCost.textContent = formatCurrency(addonSubtotal);
        venueCost.textContent = formatCurrency(venueSubtotal);
        totalCost.textContent = formatCurrency(total);

        const addons = [];
        if (addonPhotography.checked) addons.push('Photography');
        if (addonVideography.checked) addons.push('Videography');
        if (addonDj.checked) addons.push('DJ & Sound');
        if (addonCatering.checked) addons.push('Catering');

        addonsField.value = addons.join(',');
    };

    const syncEventName = () => {
        if (!eventName.value.trim()) {
            eventName.value = `${serviceType.value} Event`;
        }
    };

    [serviceType, guestCount, eventDate, durationHours, venueType, addonPhotography, addonVideography, addonDj, addonCatering]
        .forEach((input) => input.addEventListener('input', calculateTotal));
    serviceType.addEventListener('change', syncEventName);

    calculateTotal();
    syncEventName();
})();
</script>
@endsection
