@extends('layouts.app')

@section('title', 'Event Services - EventPro')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-emerald-700 to-sky-500 text-white py-12 sm:py-16 md:py-24">
    <div class="absolute inset-0 bg-slate-900/30"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">Services</h1>
        <p class="text-sm sm:text-base md:text-lg text-emerald-50">Pick a service, customize it, and book in minutes.</p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div id="wedding-planning" class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-gradient-to-br from-white via-white to-emerald-50/70 p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-rose-400 via-amber-400 to-emerald-400"></div>
                <div class="flex items-start justify-between">
                    <span class="inline-flex items-center rounded-full bg-rose-50 px-3 py-1 text-xs font-semibold text-rose-700">Signature</span>
                    <div class="rounded-xl bg-rose-100 p-2 text-rose-600">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M12 21c-4.97-4.42-8-7.2-8-11.1A4.9 4.9 0 0 1 8.9 5 5.1 5.1 0 0 1 12 6.2 5.1 5.1 0 0 1 15.1 5 4.9 4.9 0 0 1 20 9.9C20 13.8 16.97 16.58 12 21z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="mt-4 text-lg font-bold text-slate-900">Wedding Planning</h3>
                <p class="text-sm text-slate-600 mb-6">Full-service planning, design, and coordination.</p>
                <div class="flex gap-3">
                    <a href="{{ route('customize', ['service' => 'Wedding Planning']) }}" class="flex-1 text-center rounded-lg border border-emerald-400 px-3 py-2 text-sm font-semibold text-emerald-700 hover:bg-emerald-50">Customize</a>
                    <a href="{{ route('customize', ['service' => 'Wedding Planning']) }}" class="flex-1 text-center rounded-lg bg-emerald-600 px-3 py-2 text-sm font-semibold text-white hover:bg-emerald-700">Book</a>
                </div>
            </div>
            <div id="corporate-events" class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-gradient-to-br from-white via-white to-sky-50/70 p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-sky-400 via-cyan-400 to-emerald-400"></div>
                <div class="flex items-start justify-between">
                    <span class="inline-flex items-center rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">Business</span>
                    <div class="rounded-xl bg-sky-100 p-2 text-sky-600">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M4 7a3 3 0 0 1 3-3h2.5a1 1 0 0 1 0 2H7a1 1 0 0 0-1 1v2h12V7a1 1 0 0 0-1-1h-2.5a1 1 0 1 1 0-2H17a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7zm14 6H6v4a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-4z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="mt-4 text-lg font-bold text-slate-900">Corporate Events</h3>
                <p class="text-sm text-slate-600 mb-6">Conferences, launches, and team experiences.</p>
                <div class="flex gap-3">
                    <a href="{{ route('customize', ['service' => 'Corporate Events']) }}" class="flex-1 text-center rounded-lg border border-emerald-400 px-3 py-2 text-sm font-semibold text-emerald-700 hover:bg-emerald-50">Customize</a>
                    <a href="{{ route('customize', ['service' => 'Corporate Events']) }}" class="flex-1 text-center rounded-lg bg-emerald-600 px-3 py-2 text-sm font-semibold text-white hover:bg-emerald-700">Book</a>
                </div>
            </div>
            <div id="birthday-parties" class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-gradient-to-br from-white via-white to-amber-50/70 p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-amber-400 via-orange-400 to-rose-400"></div>
                <div class="flex items-start justify-between">
                    <span class="inline-flex items-center rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">Celebration</span>
                    <div class="rounded-xl bg-amber-100 p-2 text-amber-600">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M12 3a2 2 0 0 1 2 2v1h-4V5a2 2 0 0 1 2-2zm-4 5h8a2 2 0 0 1 2 2v2a6 6 0 0 1-12 0v-2a2 2 0 0 1 2-2zm-1 8a7 7 0 0 0 10 0v3a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2v-3z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="mt-4 text-lg font-bold text-slate-900">Birthday Parties</h3>
                <p class="text-sm text-slate-600 mb-6">Themes, decor, entertainment, and catering.</p>
                <div class="flex gap-3">
                    <a href="{{ route('customize', ['service' => 'Birthday Parties']) }}" class="flex-1 text-center rounded-lg border border-emerald-400 px-3 py-2 text-sm font-semibold text-emerald-700 hover:bg-emerald-50">Customize</a>
                    <a href="{{ route('customize', ['service' => 'Birthday Parties']) }}" class="flex-1 text-center rounded-lg bg-emerald-600 px-3 py-2 text-sm font-semibold text-white hover:bg-emerald-700">Book</a>
                </div>
            </div>
            <div id="concerts" class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-gradient-to-br from-white via-white to-violet-50/70 p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-violet-400 via-fuchsia-400 to-rose-400"></div>
                <div class="flex items-start justify-between">
                    <span class="inline-flex items-center rounded-full bg-violet-50 px-3 py-1 text-xs font-semibold text-violet-700">Live</span>
                    <div class="rounded-xl bg-violet-100 p-2 text-violet-600">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M9 8a3 3 0 1 1 6 0v4a3 3 0 1 1-6 0V8zm8 0a1 1 0 0 0-2 0v4a5 5 0 0 1-10 0V8a1 1 0 1 0-2 0v4a7 7 0 0 0 6 6.93V21a1 1 0 1 0 2 0v-2.07A7 7 0 0 0 17 12V8z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="mt-4 text-lg font-bold text-slate-900">Concerts</h3>
                <p class="text-sm text-slate-600 mb-6">Stage, sound, logistics, and security planning.</p>
                <div class="flex gap-3">
                    <a href="{{ route('customize', ['service' => 'Concerts']) }}" class="flex-1 text-center rounded-lg border border-emerald-400 px-3 py-2 text-sm font-semibold text-emerald-700 hover:bg-emerald-50">Customize</a>
                    <a href="{{ route('customize', ['service' => 'Concerts']) }}" class="flex-1 text-center rounded-lg bg-emerald-600 px-3 py-2 text-sm font-semibold text-white hover:bg-emerald-700">Book</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-gradient-to-r from-emerald-600 to-amber-500 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Need a custom service mix?</h2>
        <p class="text-lg mb-8">Tell us what you are planning and we will build a package around it.</p>
        <a href="/contact" class="inline-block px-8 py-3 bg-white text-emerald-700 font-bold rounded-lg hover:shadow-lg transition">
            Talk to Us
        </a>
    </div>
</section>
@endsection
