@extends('layouts.app')

@section('title', 'Admin Bookings - EventPro')

@section('content')
<section class="min-h-screen bg-slate-50 py-8">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-slate-900">Bookings</h1>
                <p class="text-sm text-slate-500">Review and manage bookings.</p>
            </div>
            <a href="{{ route('admin.bookings.create') }}" class="inline-flex items-center justify-center rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">
                Add Booking
            </a>
        </div>

        @if(session('success'))
            <div class="mt-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <table class="w-full text-sm">
                <thead class="bg-slate-100 text-left text-xs uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-4 py-3">Event</th>
                        <th class="px-4 py-3">Customer</th>
                        <th class="px-4 py-3">Package</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($bookings as $booking)
                        <tr>
                            <td class="px-4 py-3 font-medium text-slate-900">{{ $booking->event_name }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $booking->user?->name ?? 'Unknown' }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $booking->package?->name ?? '—' }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $booking->event_date->format('M d, Y') }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ ucfirst($booking->status) }}</td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('admin.bookings.show', $booking) }}" class="text-emerald-700 hover:text-emerald-800">View</a>
                                <a href="{{ route('admin.bookings.edit', $booking) }}" class="ml-3 text-slate-600 hover:text-slate-900">Edit</a>
                                <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="inline" onsubmit="return confirm('Delete this booking?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-3 text-rose-600 hover:text-rose-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-slate-500">No bookings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $bookings->links() }}
        </div>
    </div>
</section>
@endsection
