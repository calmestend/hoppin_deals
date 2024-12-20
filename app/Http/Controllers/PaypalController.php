<?php

namespace App\Http\Controllers;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;

class PayPalController extends Controller
{
    public function payment(Request $request)
    {
        $total = $request->input('total');

        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.payment.success'),
                "cancel_url" => route('paypal.payment.cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "MXN",
                        "value" => $total
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }


    public function paymentCancel()
    {
        return redirect()
              ->route('client.shopping_cart')
              ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (!isset($response['status'])) {
            abort(404);
        }

        if ($response['status'] == 'COMPLETED') {
            return CheckoutController::create();
        } else {
            return redirect()
                ->route('client.shopping_cart')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}
