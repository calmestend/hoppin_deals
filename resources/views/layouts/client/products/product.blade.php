<x-client-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-rose-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold text-pink-600 mb-4">{{ $stock->product->name }}</h1>
                <img src="{{ asset('storage/' . $stock->product->getFirstMedia('thumb')->id . '/' . $stock->product->getFirstMedia('thumb')->file_name) }}"
                    alt="{{ $stock->product->name }}" class="w-64 h-full object-cover rounded-lg mb-4">

                <p class="text-gray-800 text-lg mb-4">Precio: 💖 ${{ number_format($stock->product->price, 2) }} 💖</p>
                <p class="text-gray-600 mb-6">{{ $stock->product->description }}</p>

                <!-- Campo para mostrar el mensaje -->
                @if(session('message'))
                <div class="bg-yellow-200 text-yellow-800 p-4 rounded-lg mb-4">
                    {{ session('message') }}
                </div>
                @endif

                <div class="flex justify-center space-x-4">
                    <form method="POST" action="{{ route('client.wishlist.store') }}">
                        @csrf
                        <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                        <button type="submit"
                            class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition duration-300">
                            Add to Wish List
                        </button>
                    </form>

                    <form method="POST" action="{{ route('client.shopping_cart.store') }}">
                        @csrf
                        <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit"
                            class="transition ease-in-out bg-violet-300 hover:scale-105 hover:bg-violet-500 duration-225 px-4 py-2 rounded-md text-white">
                            Add to Shopping Cart
                        </button>
                        <x-input-error :messages="$errors->get('stock_id')" class="mt-2" />
                        <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-client-layout>
