<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="bg-white p-8 rounded-lg shadow-lg max-w-md mx-auto">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-lg font-semibold text-gray-700" />
            <x-text-input id="name" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-amber-500 focus:border-amber-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-lg font-semibold text-gray-700" />
            <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-amber-500 focus:border-amber-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-lg font-semibold text-gray-700" />

            <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-amber-500 focus:border-amber-500" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-lg font-semibold text-gray-700" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-amber-500 focus:border-amber-500" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-amber-600 hover:text-amber-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 px-6 py-2 bg-amber-600 text-white rounded-lg shadow-md hover:bg-amber-700 transition duration-200 ease-in-out focus:ring-2 focus:ring-amber-500 focus:outline-none">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
