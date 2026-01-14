@extends('layouts.app')

@section('title', 'Admin Packages - EventPro')

@section('content')
<section class="min-h-screen bg-slate-50 py-8">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-slate-900">Packages</h1>
                <p class="text-sm text-slate-500">Manage service packages.</p>
            </div>
            <a href="{{ route('admin.packages.create') }}" class="inline-flex items-center justify-center rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">
                Add Package
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
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Max Guests</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($packages as $package)
                        <tr>
                            <td class="px-4 py-3 font-medium text-slate-900">{{ $package->name }}</td>
                            <td class="px-4 py-3 text-slate-600">${{ number_format($package->price, 2) }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $package->max_guests }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $package->is_active ? 'Active' : 'Inactive' }}</td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('admin.packages.show', $package) }}" class="text-emerald-700 hover:text-emerald-800">View</a>
                                <a href="{{ route('admin.packages.edit', $package) }}" class="ml-3 text-slate-600 hover:text-slate-900">Edit</a>
                                <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" class="inline" onsubmit="return confirm('Delete this package?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-3 text-rose-600 hover:text-rose-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-slate-500">No packages found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $packages->links() }}
        </div>
    </div>
</section>
@endsection
