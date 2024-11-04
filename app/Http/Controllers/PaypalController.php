<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PaypalController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        // Calcular el total de la compra
        foreach ($cart as $stockId => $item) {
            $stock = Stock::findOrFail($stockId);
            $total += $stock->product->price * $item['quantity'];
        }

        return view('checkout', compact('total'));
    }

    private function getAccessToken(): string
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic ' . base64_encode(config('paypal.client_id') . ':' . config('paypal.client_secret'))
        ];

        // Solicitar el token de acceso a PayPal
        $response = Http::withHeaders($headers)
            ->withBody('grant_type=client_credentials')
            ->post(config('paypal.base_url') . '/v1/oauth2/token');

        // Devolver el token de acceso
        return json_decode($response->body())->access_token;
    }

    public function create(int $amount)
    {
        $id = uuid_create();

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getAccessToken(),
            'PayPal-Request-Id' => $id,
        ];

        $body = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "reference_id" => $id,
                    "amount" => [
                        "currency_code" => config('paypal.currency'), // Usar la moneda desde la configuración
                        "value" => number_format($amount, 2, '.', ''),
                    ]
                ]
            ]
        ];

        // Crear la orden en PayPal
        $response = Http::withHeaders($headers)
            ->withBody(json_encode($body))
            ->post(config('paypal.base_url') . '/v2/checkout/orders');

        Session::put('request_id', $id);
        Session::put('order_id', json_decode($response->body())->id);


        return json_decode($response->body());
    }

    public function complete(Request $request, $orderId) // Cambia esto para recibir el orderId
    {
        $url = config('paypal.base_url') . '/v2/checkout/orders/' . $orderId;

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getAccessToken(),
        ];

        $response = Http::withHeaders($headers)
            ->post($url, null);

        return json_decode($response->body());
    }


}
