<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Stock;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

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
        $rfc = $request->rfc;

        $pdf = Pdf::loadView('pdf.invoice', compact('rfc', 'address', 'cartItems'));

        return $pdf->download('invoice.pdf');
    }
}
