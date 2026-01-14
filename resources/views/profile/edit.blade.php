<x-app-layout>
    <div class="min-h-screen bg-slate-50">
        <div class="mx-auto flex w-full max-w-7xl gap-6 px-4 py-6 sm:px-6 lg:px-8 lg:py-8">
            @include('partials.customer-sidebar', ['active' => 'profile'])

            <section class="min-w-0 flex-1">
                <div class="max-w-4xl space-y-6">
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
            </section>
        </div>
    </div>
</x-app-layout>
