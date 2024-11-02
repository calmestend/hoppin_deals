<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="my-4" method="GET" action="{{ route('admin.products.create') }}">
                <button
                    class="shadow shadow-lg hover:shadow-xl bg-rose-400 transition hover:ease-in-out hover:shadow-rose-200 shadow-rose-100 hover:scale-105 hover:bg-rose-500 duration-225 px-4 py-2 rounded-md text-white">
                    Create Product
                </button>
            </form>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-gray dark:bg-gray-800 overflow-hidden shadow shadow-lg hover:shadow-xl transition hover:ease-in-out duration-100 hover:shadow-rose-200 shadow-rose-100 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="overflow-x-auto">
                            <table
                                class="min-w-full table-auto border-collapse rounded-md shadow-sm border-rose-200 dark:border-gray-700">
                                <thead>
                                    <tr class="bg-rose-100 dark:bg-gray-700 rounded-t-md">
                                        <th
                                            class="px-4 py-2 border-rose-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md text-left">
                                            Product ID
                                        </th>
                                        <th
                                            class="px-4 py-2 border-rose-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Category Name
                                        </th>
                                        <th
                                            class="px-4 py-2 border-rose-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Name
                                        </th>
                                        <th
                                            class="px-4 py-2 border-rose-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Description
                                        </th>
                                        <th
                                            class="px-4 py-2 border-rose-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Cost
                                        </th>
                                        <th
                                            class="px-4 py-2 border-rose-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                            Price
                                        </th>
                                        <th
                                            class="px-4 py-2 border-rose-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left rounded-r-md">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr class="hover:bg-rose-50 dark:hover:bg-gray-600">
                                        <td
                                            class="px-4 py-2 border-rose-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md">
                                            {{ $product->id }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-rose-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md">
                                            {{ $product->category->name }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-rose-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $product->name }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-rose-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $product->description }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-rose-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $product->cost }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-rose-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $product->price }}
                                        </td>
                                        <td
                                            class="px-4 py-2 border-rose-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-r-md flex space-x-2">
                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="transition ease-in-out bg-rose-300 hover:scale-105 hover:bg-rose-500 duration-225 px-4 py-2 rounded-md text-white">
                                                    ✖️
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.products.edit', $product->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="transition ease-in-out bg-rose-300 hover:scale-105 hover:bg-rose-500 duration-225 px-4 py-2 rounded-md text-white">
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
