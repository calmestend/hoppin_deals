<nav x-data="{ open: false }"
    class="bg-pink-100 dark:bg-pink-900 border-b-4 border-pink-300 dark:border-pink-700 shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex space-x-6">
                <!-- Navigation Links -->
                <div class="sm:flex sm:space-x-6">
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')"
                        class="text-pink-600 dark:text-pink-200 font-semibold">
                        {{ __('Home') }}
                    </x-nav-link>

                    <x-nav-link :href="route('admin.users')" :active="request()->routeIs('admin.users')"
                        class="text-pink-600 dark:text-pink-200 font-semibold">
                        {{ __('Users') }}
                    </x-nav-link>

                    <x-nav-link :href="route('admin.branches')" :active="request()->routeIs('admin.branches')"
                        class="text-pink-600 dark:text-pink-200 font-semibold">
                        {{ __('Branches') }}
                    </x-nav-link>

                    <x-nav-link :href="route('admin.categories')" :active="request()->routeIs('admin.categories')"
                        class="text-pink-600 dark:text-pink-200 font-semibold">
                        {{ __('Categories') }}
                    </x-nav-link>

                    <x-nav-link :href="route('admin.products')" :active="request()->routeIs('admin.products')"
                        class="text-pink-600 dark:text-pink-200 font-semibold">
                        {{ __('Products') }}
                    </x-nav-link>

                    <x-nav-link :href="route('admin.stocks')" :active="request()->routeIs('admin.stocks')"
                        class="text-pink-600 dark:text-pink-200 font-semibold">
                        {{ __('Stocks') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-4 py-2 bg-pink-200 text-sm font-medium rounded-md dark:bg-pink-800 dark:text-pink-200">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="h-4 w-4 ml-2 fill-current text-pink-500 dark:text-pink-300"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-pink-500 dark:text-pink-300">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-pink-500 dark:text-pink-300">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
