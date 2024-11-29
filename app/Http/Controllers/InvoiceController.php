<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'rfc' => ['required'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:5'],
            'street' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:10'],
            'city_id' => ['required'],
            'cartItems' => ['required']
        ]);

        $address = Address::create([
            'neighborhood' => $request->neighborhood,
            'zip_code' => $request->zip_code,
            'street' => $request->street,
            'number' => $request->number,
            'city_id' => $request->city_id,
        ]);

        $cartItems = json_decode($request->input('cartItems'), true);

        $total = array_reduce($cartItems, function ($carry, $item) {
            return $carry + $item['stock']['product']['price'] * $item['quantity'];
        }, 0);

        $subtotal = $total / 1.16;
        $iva = $total - $subtotal;

        $issuer = [
            'name' => 'Hoppin\' Deals',
            'rfc' => 'JBQ240426LS2'
        ];

        $receiver = [
            'rfc' => $request->rfc,
            'name' => Auth::user()->name,
            'address' => $address,
        ];


        $pdf = Pdf::loadView('pdf.invoice', compact('issuer', 'receiver', 'cartItems', 'subtotal', 'iva', 'total'));

        return $pdf->download('invoice.pdf');
    }
}
