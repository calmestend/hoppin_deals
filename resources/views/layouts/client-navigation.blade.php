<nav x-data="{ open: false }"
    class="bg-pink-100 dark:bg-pink-900 border-b-4 border-pink-300 dark:border-pink-700 shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex space-x-6">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('client.dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-pink-600 dark:text-pink-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="sm:flex sm:space-x-6">
                    <!-- Dashboard -->
                    <x-nav-link :href="route('client.dashboard')" :active="request()->routeIs('client.dashboard')"
                        class="text-pink-600 dark:text-pink-200 font-semibold">
                        {{ __('Home') }}
                    </x-nav-link>

                    <!-- Wish List -->
                    <x-nav-link :href="route('client.wishlist')" :active="request()->routeIs('client.wishlist')"
                        class="text-pink-600 dark:text-pink-200 font-semibold">
                        {{ __('Wish List') }}
                    </x-nav-link>

                    <!-- Shopping Cart -->
                    <x-nav-link :href="route('client.shopping_cart')"
                        :active="request()->routeIs('client.shopping_cart')"
                        class="text-pink-600 dark:text-pink-200 font-semibold">
                        {{ __('Shopping Cart') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
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

                        <!-- Authentication -->
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

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-pink-400 dark:text-pink-500 hover:text-pink-500 dark:hover:text-pink-400 hover:bg-pink-100 dark:hover:bg-pink-900 focus:outline-none focus:bg-pink-100 dark:focus:bg-pink-900 focus:text-pink-500 dark:focus:text-pink-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <!-- Responsive Dashboard -->
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('client.dashboard')" :active="request()->routeIs('client.dashboard')"
                class="text-pink-600 dark:text-pink-200 font-semibold">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Wish List -->
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('client.wishlist')" :active="request()->routeIs('client.wishlist')"
                class="text-pink-600 dark:text-pink-200 font-semibold">
                {{ __('Wish List') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Shopping Cart -->
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('client.shopping_cart')"
                :active="request()->routeIs('client.shopping_cart')"
                class="text-pink-600 dark:text-pink-200 font-semibold">
                {{ __('Shopping Cart') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-pink-300 dark:border-pink-700">
            <div class="px-4">
                <div class="font-medium text-base text-pink-600 dark:text-pink-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-pink-500 dark:text-pink-300">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-pink-500 dark:text-pink-300">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="text-pink-500 dark:text-pink-300">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
