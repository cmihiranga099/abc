@extends('layouts.app')

@section('title', 'Create Package - EventPro')

@section('content')
<section class="min-h-screen bg-slate-50 py-8">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-slate-900">Create Package</h1>
            <p class="text-sm text-slate-500">Add a new package offering.</p>
        </div>

        <form action="{{ route('admin.packages.store') }}" method="POST" class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            @csrf

            <div class="grid gap-4 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label class="text-sm font-medium text-slate-700">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                    @error('name') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Price</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                    @error('price') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Max Guests</label>
                    <input type="number" name="max_guests" value="{{ old('max_guests') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                    @error('max_guests') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Category</label>
                    <input type="text" name="category" value="{{ old('category') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
                </div>
                <div class="flex items-center gap-2 sm:items-end">
                    <input type="checkbox" id="is_active" name="is_active" value="1" class="h-4 w-4 rounded border-slate-300" @checked(old('is_active'))>
                    <label for="is_active" class="text-sm text-slate-700">Active</label>
                </div>
                <div class="sm:col-span-2">
                    <label class="text-sm font-medium text-slate-700">Description</label>
                    <textarea name="description" rows="3" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">{{ old('description') }}</textarea>
                </div>
                <div class="sm:col-span-2">
                    <label class="text-sm font-medium text-slate-700">Features (one per line)</label>
                    <textarea name="features" rows="4" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">{{ old('features') }}</textarea>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <a href="{{ route('admin.packages.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700">Cancel</a>
                <button type="submit" class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">Create Package</button>
            </div>
        </form>
    </div>
</section>
@endsection
