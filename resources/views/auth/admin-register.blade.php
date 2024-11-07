<x-admin-layout>
    <form method="POST" action="{{ route('admin.register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')"
                class="text-lg text-pink-600 dark:text-pink-300 font-medium" />
            <x-text-input id="name"
                class="block mt-1 w-full px-4 py-2 bg-white dark:bg-gray-800 border border-pink-200 dark:border-pink-600 text-gray-800 dark:text-gray-100 rounded-none"
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-pink-500 dark:text-pink-400" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')"
                class="text-lg text-pink-600 dark:text-pink-300 font-medium" />
            <x-text-input id="email"
                class="block mt-1 w-full px-4 py-2 bg-white dark:bg-gray-800 border border-pink-200 dark:border-pink-600 text-gray-800 dark:text-gray-100 rounded-none"
                type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-500 dark:text-pink-400" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')"
                class="text-lg text-pink-600 dark:text-pink-300 font-medium" />
            <x-text-input id="password"
                class="block mt-1 w-full px-4 py-2 bg-white dark:bg-gray-800 border border-pink-200 dark:border-pink-600 text-gray-800 dark:text-gray-100 rounded-none"
                type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-pink-500 dark:text-pink-400" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                class="text-lg text-pink-600 dark:text-pink-300 font-medium" />
            <x-text-input id="password_confirmation"
                class="block mt-1 w-full px-4 py-2 bg-white dark:bg-gray-800 border border-pink-200 dark:border-pink-600 text-gray-800 dark:text-gray-100 rounded-none"
                type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')"
                class="mt-2 text-pink-500 dark:text-pink-400" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button
                class="shadow shadow-lg hover:shadow-xl bg-pink-400 transition hover:ease-in-out  hover:shadow-pink-200 shadow-pink-100 hover:scale-105 hover:bg-pink-500 duration-225 px-4 py-2 rounded-md text-white">
                Register
            </button>
        </div>
    </form>
</x-admin-layout>
