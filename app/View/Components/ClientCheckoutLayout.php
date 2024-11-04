<?php

namespace App\View\Components;

use App\Models\Stock;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClientCheckoutLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $cart = session()->get('cart', []);
        $total = 0;

        // Calcular el total de la compra
        foreach ($cart as $stockId => $item) {
            $stock = Stock::findOrFail($stockId);
            $total += $stock->product->price * $item['quantity'];
        }

        return view('components.client-checkout-layout', compact('total'));
    }
}
