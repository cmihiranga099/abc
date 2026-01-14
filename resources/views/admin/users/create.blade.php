@extends('layouts.app')

@section('title', 'Create User - EventPro')

@section('content')
<section class="min-h-screen bg-slate-50 py-8">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-slate-900">Create User</h1>
            <p class="text-sm text-slate-500">Add a new user account.</p>
        </div>

        <form action="{{ route('admin.users.store') }}" method="POST" class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            @csrf

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-sm font-medium text-slate-700">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                    @error('name') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                    @error('email') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Password</label>
                    <input type="password" name="password" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" required>
                    @error('password') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Role</label>
                    <select name="role" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
                        <option value="">User</option>
                        @foreach($roles as $role)
                            <option value="{{ $role }}" @selected(old('role') === $role)>{{ ucfirst($role) }}</option>
                        @endforeach
                    </select>
                    @error('role') <p class="mt-1 text-xs text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">City</label>
                    <input type="text" name="city" value="{{ old('city') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
                </div>
                <div class="sm:col-span-2">
                    <label class="text-sm font-medium text-slate-700">Address</label>
                    <input type="text" name="address_line" value="{{ old('address_line') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Country</label>
                    <input type="text" name="country" value="{{ old('country') }}" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
                </div>
                <div class="sm:col-span-2">
                    <label class="text-sm font-medium text-slate-700">Bio</label>
                    <textarea name="bio" rows="3" class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">{{ old('bio') }}</textarea>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <a href="{{ route('admin.users.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700">Cancel</a>
                <button type="submit" class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">Create User</button>
            </div>
        </form>
    </div>
</section>
@endsection
