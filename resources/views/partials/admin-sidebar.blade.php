@php
    $sidebarUser = Auth::user();
    $active = $active ?? 'dashboard';
@endphp

<aside class="hidden w-64 flex-shrink-0 lg:block">
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="flex h-12 w-12 shrink-0 aspect-square items-center justify-center rounded-full bg-gradient-to-br from-slate-800 to-slate-600 text-white font-bold">
                AD
            </div>
            <div>
                <p class="text-lg font-semibold text-slate-900">Admin</p>
                <p class="text-xs text-slate-500">Control Center</p>
            </div>
        </div>

        <nav class="mt-8 space-y-2 text-sm">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 {{ $active === 'dashboard' ? 'bg-slate-100 font-semibold text-slate-900' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <span class="h-2 w-2 rounded-full bg-slate-700"></span>
                Dashboard
            </a>
            <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 {{ $active === 'users' ? 'bg-slate-100 font-semibold text-slate-900' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                Users
            </a>
            <a href="{{ route('admin.packages.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 {{ $active === 'packages' ? 'bg-slate-100 font-semibold text-slate-900' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <span class="h-2 w-2 rounded-full bg-amber-500"></span>
                Packages
            </a>
            <a href="{{ route('services') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 {{ $active === 'services' ? 'bg-slate-100 font-semibold text-slate-900' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                Services
            </a>
            <a href="{{ route('admin.bookings.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 {{ $active === 'bookings' ? 'bg-slate-100 font-semibold text-slate-900' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <span class="h-2 w-2 rounded-full bg-sky-500"></span>
                Bookings
            </a>
            <a href="{{ route('admin.payments.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 {{ $active === 'payments' ? 'bg-slate-100 font-semibold text-slate-900' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <span class="h-2 w-2 rounded-full bg-teal-500"></span>
                Payments
            </a>
            <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 {{ $active === 'profile' ? 'bg-slate-100 font-semibold text-slate-900' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <span class="h-2 w-2 rounded-full bg-rose-500"></span>
                Profile
            </a>
        </nav>
    </div>

    <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="flex h-12 w-12 shrink-0 aspect-square items-center justify-center rounded-full bg-slate-800 text-white font-semibold">
                {{ $sidebarUser ? strtoupper(substr($sidebarUser->name, 0, 1)) : 'AD' }}
            </div>
            <div>
                <p class="text-sm font-semibold text-slate-900">{{ $sidebarUser?->name ?? 'Administrator' }}</p>
                <p class="text-xs text-slate-500">Admin access</p>
            </div>
        </div>
    </div>
</aside>
