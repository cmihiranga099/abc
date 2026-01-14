<x-guest-layout>
    <div class="mb-8 bg-gradient-to-r from-emerald-500/10 to-amber-400/10 rounded-2xl p-6 border border-emerald-300/30">
        <h1 class="text-3xl font-bold bg-gradient-to-r from-emerald-600 to-amber-500 bg-clip-text text-transparent mb-2">Welcome Back</h1>
        <p class="text-gray-700 font-medium">Sign in to your EventPro account</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input 
                id="email" 
                class="mt-1 bg-gradient-to-r from-slate-50 to-emerald-50 border-emerald-200" 
                type="email" 
                name="email" 
                :value="old('email')" 
                placeholder="your@email.com"
                required 
                autofocus 
                autocomplete="username" 
            />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input 
                id="password" 
                class="mt-1 bg-gradient-to-r from-slate-50 to-amber-50 border-amber-200"
                type="password"
                name="password"
                placeholder="••••••••"
                required 
                autocomplete="current-password" 
            />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center bg-gradient-to-r from-emerald-50/50 to-amber-50/50 rounded-lg p-3 border border-emerald-100">
            <input 
                id="remember_me" 
                type="checkbox" 
                class="rounded border-emerald-300 text-emerald-700 shadow-sm focus:ring-emerald-400 focus:ring-2" 
                name="remember"
            >
            <label for="remember_me" class="ms-3 text-sm font-medium text-gray-800">
                {{ __('Remember me for 30 days') }}
            </label>
        </div>

        <div class="flex flex-col gap-3 mt-6">
            <x-primary-button class="w-full justify-center text-base">
                {{ __('Sign In') }}
            </x-primary-button>

            @if (Route::has('password.request'))
                <a class="text-center text-sm text-emerald-700 hover:text-emerald-800 font-semibold rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-400 transition" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="relative mt-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gradient-to-r from-emerald-200 via-amber-200 to-emerald-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-3 bg-white text-gray-500 font-medium">or continue</span>
            </div>
        </div>

        <div class="text-center mt-8 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl p-4 border border-cyan-200">
            <p class="text-gray-800">
                {{ __("Don't have an account?") }}
                <a class="font-bold text-transparent bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text hover:from-cyan-500 hover:to-blue-500 transition" href="{{ route('register') }}">
                    {{ __('Sign up now') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
