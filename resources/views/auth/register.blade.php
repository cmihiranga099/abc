<x-guest-layout>
    <div class="mb-8 bg-gradient-to-r from-cyan-500/10 to-blue-500/10 rounded-2xl p-6 border border-cyan-300/30">
        <h1 class="text-3xl font-bold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent mb-2">Create Account</h1>
        <p class="text-gray-700 font-medium">Join EventPro and start planning amazing events</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input 
                id="name" 
                class="mt-1 bg-gradient-to-r from-slate-50 to-blue-50 border-blue-200" 
                type="text" 
                name="name" 
                :value="old('name')" 
                placeholder="John Doe"
                required 
                autofocus 
                autocomplete="name" 
            />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input 
                id="email" 
                class="mt-1 bg-gradient-to-r from-slate-50 to-cyan-50 border-cyan-200" 
                type="email" 
                name="email" 
                :value="old('email')" 
                placeholder="your@email.com"
                required 
                autocomplete="username" 
            />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input 
                id="password" 
                class="mt-1 bg-gradient-to-r from-slate-50 to-teal-50 border-teal-200"
                type="password"
                name="password"
                placeholder="••••••••"
                required 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->get('password')" />
            <p class="text-xs text-teal-600 mt-2 font-medium">At least 8 characters with uppercase, lowercase, and numbers</p>
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input 
                id="password_confirmation" 
                class="mt-1 bg-gradient-to-r from-slate-50 to-emerald-50 border-emerald-200"
                type="password"
                name="password_confirmation" 
                placeholder="••••••••"
                required 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <!-- Terms -->
        <div class="flex items-start bg-gradient-to-r from-emerald-50 to-teal-50 rounded-lg p-4 border border-emerald-200">
            <input 
                id="terms" 
                type="checkbox" 
                class="rounded border-emerald-300 text-emerald-600 shadow-sm focus:ring-emerald-500 focus:ring-2 mt-1" 
                name="terms"
                required
            >
            <label for="terms" class="ms-3 text-xs text-gray-800">
                I agree to the 
                <a href="#" class="font-bold text-emerald-600 hover:text-emerald-800">Terms of Service</a> 
                and 
                <a href="#" class="font-bold text-emerald-600 hover:text-emerald-800">Privacy Policy</a>
            </label>
        </div>

        <div class="flex flex-col gap-3 mt-6">
            <x-primary-button class="w-full justify-center text-base">
                {{ __('Create Account') }}
            </x-primary-button>
        </div>

        <div class="relative mt-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gradient-to-r from-cyan-200 via-blue-200 to-cyan-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-3 bg-white text-gray-500 font-medium">or continue</span>
            </div>
        </div>

        <div class="text-center mt-8 bg-gradient-to-r from-orange-50 to-rose-50 rounded-2xl p-4 border border-orange-200">
            <p class="text-gray-800">
                {{ __("Already have an account?") }}
                <a class="font-bold text-transparent bg-gradient-to-r from-orange-600 to-rose-600 bg-clip-text hover:from-orange-500 hover:to-rose-500 transition" href="{{ route('login') }}">
                    {{ __('Sign in') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
