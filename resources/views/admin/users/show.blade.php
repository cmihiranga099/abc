@extends('layouts.app')

@section('title', 'User Details - EventPro')

@section('content')
<section class="min-h-screen bg-slate-50 py-8">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-slate-900">{{ $user->name }}</h1>
                <p class="text-sm text-slate-500">{{ $user->email }}</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.users.edit', $user) }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700">Edit</a>
                <a href="{{ route('admin.users.index') }}" class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">Back</a>
            </div>
        </div>

        <div class="mt-6 grid gap-6 lg:grid-cols-2">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Profile</h2>
                <div class="mt-4 space-y-2 text-sm text-slate-600">
                    <p><span class="font-semibold text-slate-900">Role:</span> {{ $user->getRoleNames()->first() ?? 'user' }}</p>
                    <p><span class="font-semibold text-slate-900">Phone:</span> {{ $user->phone ?? '—' }}</p>
                    <p><span class="font-semibold text-slate-900">Address:</span> {{ $user->address_line ?? '—' }}</p>
                    <p><span class="font-semibold text-slate-900">City:</span> {{ $user->city ?? '—' }}</p>
                    <p><span class="font-semibold text-slate-900">Country:</span> {{ $user->country ?? '—' }}</p>
                    <p><span class="font-semibold text-slate-900">Joined:</span> {{ $user->created_at->format('M d, Y') }}</p>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Activity</h2>
                <div class="mt-4 space-y-2 text-sm text-slate-600">
                    <p><span class="font-semibold text-slate-900">Bookings:</span> {{ $user->bookings->count() }}</p>
                    <p><span class="font-semibold text-slate-900">Payments:</span> {{ $user->payments->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
