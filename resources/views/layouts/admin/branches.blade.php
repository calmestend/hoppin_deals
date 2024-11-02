<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Branches') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="my-4" method="GET" action="{{ route('admin.branches.create') }}">
                <button
                    class="shadow shadow-lg hover:shadow-xl bg-violet-400 transition hover:ease-in-out  hover:shadow-violet-200 shadow-violet-100 hover:scale-105 hover:bg-violet-500 duration-225 px-4 py-2 rounded-md text-white">
                    Create Branch
                </button>
            </form>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-gray dark:bg-gray-800 overflow-hidden shadow shadow-lg hover:shadow-xl transition hover:ease-in-out duration-100 hover:shadow-violet-200 shadow-violet-100 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="overflow-x-auto">
                            <table
                                class="min-w-full table-auto border-collapse rounded-md shadow-sm border-violet-200 dark:border-gray-700">
                                <thead>
                                    <tr class="bg-violet-100 dark:bg-gray-700 rounded-t-md">
                                        <th
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md text-left">
                                            Branch ID
                                        </th>
                                        <th
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Neighborhood
                                        </th>
                                        <th
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            ZIP Code
                                        </th>
                                        <th
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Street
                                        </th>
                                        <th
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Number
                                        </th>
                                        <th
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            City
                                        </th>
                                        <th
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            State
                                        </th>
                                        <th
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left rounded-r-md">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($branches as $branch)
                                    <tr class="hover:bg-violet-50 dark:hover:bg-gray-600">
                                        <td
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md ">
                                            {{ $branch->id }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $branch->neighborhood }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $branch->zip_code }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $branch->street }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $branch->number }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $branch->city_name }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $branch->state_name }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-violet-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-r-md flex space-x-2">
                                            <form action="{{ route('admin.branches.destroy') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $branch->id }}">
                                                <button type="submit"
                                                    class="transition ease-in-out bg-violet-300 hover:scale-105 hover:bg-violet-500 duration-225 px-4 py-2 rounded-md text-white">
                                                    ✖️
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.branches.edit', $branch->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="transition ease-in-out bg-violet-300 hover:scale-105 hover:bg-violet-500 duration-225 px-4 py-2 rounded-md text-white">
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
