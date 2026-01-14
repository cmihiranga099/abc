@extends('layouts.app')

@section('title', 'Package Details - EventPro')

@section('content')
<section class="min-h-screen bg-slate-50 py-8">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-slate-900">{{ $package->name }}</h1>
                <p class="text-sm text-slate-500">Package details</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.packages.edit', $package) }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700">Edit</a>
                <a href="{{ route('admin.packages.index') }}" class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">Back</a>
            </div>
        </div>

        <div class="mt-6 grid gap-6 lg:grid-cols-2">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Overview</h2>
                <div class="mt-4 space-y-2 text-sm text-slate-600">
                    <p><span class="font-semibold text-slate-900">Price:</span> ${{ number_format($package->price, 2) }}</p>
                    <p><span class="font-semibold text-slate-900">Max Guests:</span> {{ $package->max_guests }}</p>
                    <p><span class="font-semibold text-slate-900">Category:</span> {{ $package->category ?? '—' }}</p>
                    <p><span class="font-semibold text-slate-900">Status:</span> {{ $package->is_active ? 'Active' : 'Inactive' }}</p>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Description</h2>
                <p class="mt-4 text-sm text-slate-600">{{ $package->description ?? 'No description provided.' }}</p>
            </div>
        </div>

        <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900">Features</h2>
            <ul class="mt-4 list-disc list-inside text-sm text-slate-600">
                @forelse($package->features ?? [] as $feature)
                    <li>{{ $feature }}</li>
                @empty
                    <li>No features listed.</li>
                @endforelse
            </ul>
        </div>
    </div>
</section>
@endsection
