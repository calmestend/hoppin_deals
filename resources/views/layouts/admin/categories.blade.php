<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="my-4" method="GET" action="{{ route('admin.categories.create') }}">
                <button
                    class="shadow shadow-lg hover:shadow-xl bg-purple-400 transition hover:ease-in-out hover:shadow-purple-200 shadow-purple-100 hover:scale-105 hover:bg-purple-500 duration-225 px-4 py-2 rounded-md text-white">
                    Create Category
                </button>
            </form>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-gray dark:bg-gray-800 overflow-hidden shadow shadow-lg hover:shadow-xl transition hover:ease-in-out duration-100 hover:shadow-purple-200 shadow-purple-100 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="overflow-x-auto">
                            <table
                                class="min-w-full table-auto border-collapse rounded-md shadow-sm border-purple-200 dark:border-gray-700">
                                <thead>
                                    <tr class="bg-purple-100 dark:bg-gray-700 rounded-t-md">
                                        <th
                                            class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md text-left">
                                            Category ID
                                        </th>
                                        <th
                                            class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Name
                                        </th>
                                        <th
                                            class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left rounded-r-md">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr class="hover:bg-purple-50 dark:hover:bg-gray-600">
                                        <td
                                            class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md">
                                            {{ $category->id }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $category->name }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-r-md flex space-x-2">
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="transition ease-in-out bg-purple-300 hover:scale-105 hover:bg-purple-500 duration-225 px-4 py-2 rounded-md text-white">
                                                    ✖️
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.categories.edit', $category->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="transition ease-in-out bg-purple-300 hover:scale-105 hover:bg-purple-500 duration-225 px-4 py-2 rounded-md text-white">
                                                    ✏️
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
