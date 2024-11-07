<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-pink-600 dark:text-pink-200 leading-tight tracking-wide">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-pink-100 dark:bg-pink-900 border-4 border-pink-300 dark:border-pink-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-lg text-purple-600 dark:text-purple-300 font-medium">
                        {{ __("You're logged in!") }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
