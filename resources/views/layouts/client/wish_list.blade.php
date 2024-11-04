<x-client-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-rose-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold text-pink-600 mb-4">Wish List</h1>

                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Item</th>
                            <th class="py-2 px-4 border-b">Price</th>
                            <th class="py-2 px-4 border-b"></th>
                            <th class="py-2 px-4 border-b"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($wish_list_products as $item)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $item->stock->product->name }}</td>
                            <td class="py-2 px-4 border-b">💖 ${{ number_format($item->stock->product->price,
                                2) }} 💖</td>
                            <td class="py-2 px-4 border-b">
                                <form method="post"
                                    action="{{ route('client.wishlist.destroy', ['wish_list_product_id' => $item->id]) }}">
                                    @csrf
                                    <button type="submit"
                                        class="transition ease-in-out bg-violet-300 hover:scale-105 hover:bg-violet-500 duration-225 px-4 py-2 rounded-md text-white">
                                        Remove
                                    </button>
                                </form>
                            </td>
                            <td class="py-2 px-4 border-b">
                                <form method="POST" action="{{ route('client.shopping_cart.store') }}">
                                    @csrf
                                    <input type="hidden" name="stock_id" value="{{ $item->stock->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit"
                                        class="transition ease-in-out bg-violet-300 hover:scale-105 hover:bg-violet-500 duration-225 px-4 py-2 rounded-md text-white">
                                        Add to Shopping Cart
                                    </button>
                                    <x-input-error :messages="$errors->get('stock_id')" class="mt-2" />
                                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(session('message'))
                <div class="bg-yellow-200 text-yellow-800 p-4 rounded-lg mb-4">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-client-layout>
