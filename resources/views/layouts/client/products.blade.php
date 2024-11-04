<x-client-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-rose-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-4xl text-center font-bold mb-8 text-rose-600">Productos</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($stocks as $stock)
                <div
                    class="bg-pink-100 border border-pink-300 rounded-3xl overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300">
                    <div class="relative group">
                        <a
                            href="{{ route('client.product', ['branch_id' => $stock->branch_id, 'product_id' => $stock->product_id]) }}">
                            <img src="{{ asset('storage/' . $stock->product->getFirstMedia('thumb')->id . '/' . $stock->product->getFirstMedia('thumb')->file_name) }}"
                                alt="{{ $stock->product->name }}" class="w-full h-56 object-cover rounded-t-3xl">
                            <div
                                class="absolute inset-0 bg-pink-200 bg-opacity-80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-t-3xl">
                                <span class="text-white font-semibold text-lg">✨ Más info ✨</span>
                            </div>
                        </a>
                        <div class="absolute bottom-0 w-full bg-white bg-opacity-90 p-4 rounded-b-3xl">
                            <h3 class="text-lg font-semibold text-pink-600 text-center">{{ $stock->product->name }}</h3>
                        </div>
                    </div>
                    <div class="p-4 text-center">
                        <p class="text-pink-600 text-xl font-bold">💖 ${{ number_format($stock->product->price, 2) }} 💖
                        </p>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</x-client-layout>
