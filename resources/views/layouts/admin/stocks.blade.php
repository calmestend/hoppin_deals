<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stocks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="my-4" method="GET" action="{{ route('admin.stocks.create') }}">
                <button
                    class="shadow shadow-lg hover:shadow-xl bg-pink-400 transition hover:ease-in-out hover:shadow-pink-200 shadow-pink-100 hover:scale-105 hover:bg-pink-500 duration-225 px-4 py-2 rounded-md text-white">
                    Create Stock
                </button>
            </form>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-gray dark:bg-gray-800 overflow-hidden shadow shadow-lg hover:shadow-xl transition hover:ease-in-out duration-100 hover:shadow-pink-200 shadow-pink-100 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="overflow-x-auto">
                            <table
                                class="min-w-full table-auto border-collapse rounded-md shadow-sm border-pink-200 dark:border-gray-700">
                                <thead>
                                    <tr class="bg-pink-100 dark:bg-gray-700 rounded-t-md">
                                        <th
                                            class="px-4 py-2 border-pink-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md text-left">
                                            Stock ID
                                        </th>
                                        <th
                                            class="px-4 py-2 border-pink-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Product ID
                                        </th>
                                        <th
                                            class="px-4 py-2 border-pink-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Branch ID
                                        </th>
                                        <th
                                            class="px-4 py-2 border-pink-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Product Name
                                        </th>
                                        <th
                                            class="px-4 py-2 border-pink-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Branch Address
                                        </th>
                                        <th
                                            class="px-4 py-2 border-pink-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Quantity
                                        </th>
                                        <th
                                            class="px-4 py-2 border-pink-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left rounded-r-md">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stocks as $stock)
                                    <tr class="hover:bg-pink-50 dark:hover:bg-gray-600">
                                        <td
                                            class="px-4 py-2 border-pink-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md">
                                            {{ $stock->id }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-pink-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md">
                                            {{ $stock->product_id }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-pink-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $stock->branch_id }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-pink-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $stock->product->name }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-pink-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $stock->branch->address->city->name }}, {{
                                            $stock->branch->address->city->state->name }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-pink-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $stock->quantity }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-pink-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-r-md flex space-x-2">
                                            <form action="{{ route('admin.stocks.destroy', $stock->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="transition ease-in-out bg-pink-300 hover:scale-105 hover:bg-pink-500 duration-225 px-4 py-2 rounded-md text-white">
                                                    ✖️
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.stocks.edit', $stock->id) }}" method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="transition ease-in-out bg-pink-300 hover:scale-105 hover:bg-pink-500 duration-225 px-4 py-2 rounded-md text-white">
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
