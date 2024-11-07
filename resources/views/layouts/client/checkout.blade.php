<x-client-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-rose-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold text-pink-600 mb-4">Checkout</h1>

                @if ($message = Session::get('success'))
                <div class="bg-green-200 text-yellow-800 p-4 rounded-lg mb-4">
                    {{ $message }}
                </div>
                @endif

                <div class="mt-4">
                    <button onclick="showInvoiceForm(true)"
                        class="shadow shadow-lg hover:shadow-xl bg-violet-600 transition hover:ease-in-out  hover:shadow-violet-200 shadow-violet-100 hover:scale-105 hover:bg-violet-700 duration-225 px-4 py-2 rounded-md text-white">
                        Create Invoice
                    </button>
                </div>

                <form method="POST" action="{{ route('checkout.invoice') }}" style="display:none;" id="invoice-form">
                    @csrf

                    <input type="hidden" name="cartItems" value="{{ json_encode($cartItems) }}">


                    <!-- RFC -->
                    <div> <x-input-label for="rfc" :value="__('RFC')" />
                        <x-text-input id="rfc" class="block mt-1 w-full" type="text" name="rfc" :value="old('rfc')"
                            required autofocus autocomplete="rfc" />
                        <x-input-error :messages="$errors->get('rfc')" class="mt-2" />
                    </div>

                    <!-- Neighborhood -->
                    <div> <x-input-label for="neighborhood" :value="__('Neighborhood')" />
                        <x-text-input id="neighborhood" class="block mt-1 w-full" type="text" name="neighborhood"
                            :value="old('neighborhood')" required autofocus autocomplete="neighborhood" />
                        <x-input-error :messages="$errors->get('neighborhood')" class="mt-2" />
                    </div>

                    <!-- Zip Code -->
                    <div class="mt-4">
                        <x-input-label for="zip_code" :value="__('Zip Code')" />
                        <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code"
                            :value="old('zip_code')" required autocomplete="zip_code" />
                        <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
                    </div>

                    <!-- Street -->
                    <div class="mt-4">
                        <x-input-label for="street" :value="__('Street')" />

                        <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" required
                            autocomplete="street" />

                        <x-input-error :messages="$errors->get('street')" class="mt-2" />
                    </div>

                    <!-- Number -->
                    <div class="mt-4">
                        <x-input-label for="number" :value="__('Number')" />

                        <x-text-input id="number" class="block mt-1 w-full" type="text" name="number" required
                            autocomplete="number" />

                        <x-input-error :messages="$errors->get('number')" class="mt-2" />
                    </div>

                    <!-- City -->
                    <div class="mt-4">
                        <x-input-label for="city_id" :value="__('City')" />
                        <select name="city_id" class='border-gray-300
                            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500
                            dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md
                            shadow-sm'>
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <button
                            class="shadow shadow-lg hover:shadow-xl bg-violet-600 transition hover:ease-in-out  hover:shadow-violet-200 shadow-violet-100 hover:scale-105 hover:bg-violet-700 duration-225 px-4 py-2 rounded-md text-white">
                            Download Invoice
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showInvoiceForm(show) {
            document.getElementById('invoice-form').style.display = show ? 'block' : 'none';
        }
    </script>
</x-client-layout>
