<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hoppin Deals') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col pt-6 sm:pt-0 bg-rose-200 dark:bg-gray-900">

        <!-- Navigation -->
        @include('layouts.client-navigation')

        <!-- Page Content -->
        <div class="mx-8 mt-4 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
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
                        <input type="hidden" id="paypal-amount" value="{{ $total }}">
                        <div id="payment_options"></div>
                    </div>
                </div>
            </x-client-checkout-layout>
        </div>
    </div>

    <script
        src="https://www.paypal.com/sdk/js?client-id={{ config('paypal.client_id') }}&currency=GBP&intent=capture"></script>
    <script>
        paypal.Buttons({
            createOrder: function (data, actions) {
                return fetch('/client/checkout/', {
                    method: 'post',
                    body: JSON.stringify({amount: {{$total}} }),
            headers: {
            'content-type': 'application/json'
        }
                }).then(function (response) {
            return response.json();
        }).then(function (orderData) {
            if (orderData.id) {
                return orderData.id; // Devuelve el ID de la orden
            } else {
                throw new Error('No se recibió un ID de orden válido');
            }
        });
            },
        onApprove: function (data, actions) {
            return fetch('/client/checkout/complete/' + data.orderID, {
                method: 'post'
            }).then(function (response) {
                return response.json();
            }).then(function (orderData) {
                // Manejar la respuesta de la captura de la orden
                console.log('Orden capturada', orderData);
            });
        },
        onError: function (err) {
            console.error('Error en el proceso de pago:', err);
        }
        }).render('#payment_options'); // Asegúrate de que el contenedor exista
    </script>
</body>

</html>
