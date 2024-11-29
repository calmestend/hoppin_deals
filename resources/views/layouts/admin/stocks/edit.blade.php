<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Stock') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('admin.stocks.update', $stock->id) }}">
                        @csrf
                        <!-- Quantity -->
                        <div>
                            <x-input-label for="quantity" :value="__('Quantity')" />
                            <input min="0" type="number" name="quantity" id="quantity"
                                value="{{ old('quantity', $stock->quantity) }}" required autocomplete="quantity"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>

                        <!-- Product -->
                        <div class="mt-4">
                            <x-input-label for="product_id" :value="__('Product')" />
                            <select name="product_id" class='border-gray-300
                            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500
                            dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md
                            shadow-sm'>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $stock->product_id == $product->id ?
                                    'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Branch -->
                        <div class="mt-4">
                            <x-input-label for="branch_id" :value="__('Branch')" />
                            <select name="branch_id" class='border-gray-300
                            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500
                            dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md
                            shadow-sm'>
                                @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}" {{ $stock->branch_id == $branch->id ?
                                    'selected' : '' }}>
                                    {{ $branch->address->city->name }}, {{ $branch->address->city->state->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button
                                class="shadow shadow-lg hover:shadow-xl bg-pink-400 hover:bg-pink-500 transition hover:ease-in-out  hover:shadow-pink-200 shadow-pink-100 hover:scale-105 hover:bg-pink-550 duration-225 px-4 py-2 rounded-md text-white">
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
