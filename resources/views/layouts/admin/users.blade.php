<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>Create Users</h2>
                    <div class="flex flex-row justify-around">
                        <form class="my-4" method="GET" action="{{ route('admin.users.register.client') }}">
                            <button
                                class="shadow shadow-lg hover:shadow-xl bg-indigo-400 transition hover:ease-in-out  hover:shadow-indigo-200 shadow-indigo-100 hover:scale-105 hover:bg-indigo-500 duration-225 px-4 py-2 rounded-md text-white">
                                Create Client
                            </button>
                        </form>
                        <form class="my-4" method="GET" action="{{ route('admin.users.register.admin') }}">
                            <button
                                class="shadow shadow-lg hover:shadow-xl bg-indigo-400 transition hover:ease-in-out  hover:shadow-indigo-200 shadow-indigo-100 hover:scale-105 hover:bg-indigo-500 duration-225 px-4 py-2 rounded-md text-white">
                                Create Admin
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
