<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;
use App\Models\Type;

class FrontController extends Controller
{
    public function home()
    {
        $drinks = Drink::paginate(21);

        return view('front.home', [
            'drinks' => $drinks
        ]);
    }

    public function showCatDrinks(Type $type)
    {
        $drinks = Drink::where('type_id', $type->id)->paginate(21);

        return view('front.home', [
            'drinks' => $drinks
        ]);
    }

    public function showDrink(Drink $drink)
    {
        return view('front.drink', [
            'drink' => $drink
        ]);
    }

    public function addToCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $id = (int) $request->product;
        $count = (int) $request->count;
        if (isset($cart[$id])) {
            $cart[$id] += $count;
        }
        else {
            $cart[$id] = $count;
        }
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }
}
