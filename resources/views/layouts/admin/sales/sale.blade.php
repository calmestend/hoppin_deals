<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-pink-600 dark:text-pink-200 leading-tight tracking-wide">
            {{ __('Sale Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-4">Sale ID: {{ $sale->id }}</h3>

                    <div class="container">
                        <div class="overflow-x-auto">
                            <table
                                class="min-w-full table-auto border-collapse rounded-md shadow-sm border-purple-200 dark:border-gray-700">
                                <thead>
                                    <tr class="bg-purple-100 dark:bg-gray-700 rounded-t-md">
                                        <th
                                            class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md text-left">
                                            Sale Stock Id
                                        </th>
                                        <th
                                            class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Product Cost
                                        </th>
                                        <th
                                            class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Product Price
                                        </th>
                                        <th
                                            class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Quantity
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sale->saleStocks as $saleStock)
                                    <tr class="hover:bg-purple-50 dark:hover:bg-gray-600">
                                        <td
                                            class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md">
                                            {{ $saleStock->stock->id ?? 'N/A' }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            ${{ $saleStock->stock->product->cost ?? 'N/A' }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            ${{ $saleStock->stock->product->price ?? 'N/A' }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $saleStock->quantity }}
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
