<x-app-layout>
    <div class="min-h-screen bg-slate-50 py-8 sm:py-12">
        <div class="mx-auto w-full max-w-4xl px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <div class="max-w-2xl">
                    <h2 class="text-2xl font-semibold text-slate-900">{{ __('Profile') }}</h2>
                    <p class="mt-1 text-sm text-slate-500">Keep your personal details up to date.</p>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
