<x-guest-layout>
    <!-- Tambahkan Bagian Selamat Datang -->
    <div class="text-center mb-6">
        <h1 class="text-4xl font-extrabold text-amber-600 transition-all duration-300 ease-in-out transform hover:scale-105">{{ __('Selamat Datang Di Halaman Admin!') }}</h1>
        
        <p class="text-lg text-gray-500 mt-2">{{ __('Silakan masuk untuk melanjutkan.') }}</p>
        
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded-lg shadow-lg max-w-md mx-auto">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-lg font-semibold text-gray-700" />
            <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-amber-500 focus:border-amber-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Password -->
        <div class="mt-6">
            <x-input-label for="password" :value="__('Password')" class="text-lg font-semibold text-gray-700" />

            <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-amber-500 focus:border-amber-500" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-amber-600 shadow-sm focus:ring-amber-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-amber-500 hover:text-amber-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 px-6 py-2 bg-amber-600 text-white rounded-lg shadow-md hover:bg-amber-700 transition duration-200 ease-in-out focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
