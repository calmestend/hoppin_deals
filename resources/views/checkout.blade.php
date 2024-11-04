<x-client-checkout-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-rose-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div role="alert" id="paypal-success" style="display: none;">Successful purchase!</div>
            <p>Total: {{ $total }}</p>
            <input type="hidden" id="paypal-amount" value="{{ $total}}">
            <div id="payment_options"></div>
        </div>
    </div>
</x-client-checkout-layout>
