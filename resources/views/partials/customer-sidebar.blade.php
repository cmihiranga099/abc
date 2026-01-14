@php
    $sidebarUser = Auth::user();
    $active = $active ?? 'bookings';
@endphp

<aside class="hidden w-64 flex-shrink-0 lg:block">
    <div class="rounded-2xl border border-emerald-100 bg-white/80 p-5 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="flex h-12 w-12 shrink-0 aspect-square items-center justify-center rounded-full bg-gradient-to-br from-emerald-500 to-amber-400 text-white font-bold">
                EP
            </div>
            <div>
                <p class="text-lg font-semibold text-slate-900">EventPro</p>
                <p class="text-xs text-slate-500">Customer Portal</p>
            </div>
        </div>

        <nav class="mt-8 space-y-2 text-sm">
            <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 {{ $active === 'dashboard' ? 'bg-emerald-50 font-semibold text-emerald-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                Dashboard
            </a>
            <a href="{{ route('bookings.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 {{ $active === 'bookings' ? 'bg-emerald-50 font-semibold text-emerald-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <span class="h-2 w-2 rounded-full bg-amber-400"></span>
                Bookings
            </a>
            <a href="{{ route('payments.history') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 {{ $active === 'payments' ? 'bg-emerald-50 font-semibold text-emerald-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <span class="h-2 w-2 rounded-full bg-teal-400"></span>
                Payments
            </a>
            <a href="{{ route('packages') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 {{ $active === 'packages' ? 'bg-emerald-50 font-semibold text-emerald-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                Packages
            </a>
            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 {{ $active === 'profile' ? 'bg-emerald-50 font-semibold text-emerald-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <span class="h-2 w-2 rounded-full bg-slate-400"></span>
                Profile
            </a>
        </nav>

        <div class="mt-8 rounded-xl border border-emerald-100 bg-gradient-to-br from-emerald-50 to-amber-50 p-4">
            <p class="text-xs uppercase tracking-wide text-emerald-700">Quick action</p>
            <p class="mt-1 text-sm font-semibold text-slate-900">Create a new booking</p>
            <a href="{{ route('bookings.create') }}" class="mt-3 inline-flex w-full items-center justify-center rounded-lg bg-emerald-600 px-3 py-2 text-xs font-semibold text-white hover:bg-emerald-700">
                New Booking
            </a>
        </div>
    </div>

    <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="flex h-12 w-12 shrink-0 aspect-square items-center justify-center rounded-full bg-emerald-600 text-white font-semibold">
                {{ $sidebarUser ? strtoupper(substr($sidebarUser->name, 0, 1)) : 'EP' }}
            </div>
            <div>
                <p class="text-sm font-semibold text-slate-900">{{ $sidebarUser?->name ?? 'Customer' }}</p>
                <p class="text-xs text-slate-500">Active customer</p>
            </div>
        </div>
    </div>
</aside>
