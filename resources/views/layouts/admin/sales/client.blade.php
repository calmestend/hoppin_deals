<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-pink-600 dark:text-pink-200 leading-tight tracking-wide">
            {{ __('Sales for Client: ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-4">Sales for Client: {{ $client->user->email }}</h3>

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
                                                        Sale Id
                                                    </th>
                                                    <th
                                                        class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                                        Payment Id
                                                    </th>
                                                    <th
                                                        class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                                        Payment
                                                    </th>
                                                    <th
                                                        class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                                        Client Email
                                                    </th>
                                                    <th
                                                        class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left rounded-r-md">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sales as $sale)
                                                <tr class="hover:bg-purple-50 dark:hover:bg-gray-600">
                                                    <td
                                                        class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md">
                                                        {{ $sale->id }}
                                                    </td>
                                                    <td
                                                        class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                                        {{ $sale->payment_id }}
                                                    </td>
                                                    <td
                                                        class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                                        ${{ $sale->payment->amount }}
                                                    </td>
                                                    <td
                                                        class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                                        {{ $sale->client->user->email }}
                                                    </td>
                                                    <td
                                                        class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-r-md flex space-x-2">
                                                        <form
                                                            action="{{ route('admin.sales.show', ['id' => $sale->id]) }}"
                                                            method="get">
                                                            @csrf
                                                            <button type="submit"
                                                                class="transition ease-in-out bg-purple-300 hover:scale-105 hover:bg-purple-500 duration-225 px-4 py-2 rounded-md text-white">
                                                                🔍
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
            </div>
        </div>
    </div>
</x-admin-layout>
