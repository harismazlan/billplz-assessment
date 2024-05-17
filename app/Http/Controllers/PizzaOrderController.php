<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaOrderController extends Controller
{
    public function index()
    {
        return view('pizza-order');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'size' => 'required|string|in:small,medium,large',
            'pepperoni' => 'sometimes|boolean',
            'extra_cheese' => 'sometimes|boolean',
        ]);

        $sizePrices = [
            'small' => 15,
            'medium' => 22,
            'large' => 30,
        ];

        $pepperoniPrices = [
            'small' => 3,
            'medium' => 5,
            'large' => 0,
        ];

        $extraCheesePrice = 6;

        $size = $request->input('size');
        $pepperoni = $request->input('pepperoni', false);
        $extraCheese = $request->input('extra_cheese', false);

        $total = $sizePrices[$size];

        if ($pepperoni) {
            $total += $pepperoniPrices[$size];
        }

        if ($extraCheese) {
            $total += $extraCheesePrice;
        }

        return view('pizza-order', [
            'total' => $total,
            'size' => $size,
            'pepperoni' => $pepperoni,
            'extra_cheese' => $extraCheese,
        ]);
    }
}
