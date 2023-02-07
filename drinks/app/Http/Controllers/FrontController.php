<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;
use App\Models\Type;
use App\Models\Order;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;

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

    public function addToCart(Request $request, CartService $cart)
    {
        $id = (int) $request->product;
        $count = (int) $request->count;
        $cart->add($id, $count);
        return redirect()->back();
    }

    public function cart(CartService $cart)
    {
        return view('front.cart', [
            'cartList' => $cart->list
        ]);
    }

    public function updateCart(Request $request, CartService $cart)
    {
       
        if ($request->delete) {
            $cart->delete($request->delete);
        } else {
        $updatedCart = array_combine($request->ids ?? [], $request->count ?? []);
        $cart->update($updatedCart);
        }
        return redirect()->back();
    }

    public function makeOrder(CartService $cart)
    {
        $order = new Order;

        $order->user_id = Auth::user()->id;

        $order->order_json = json_encode($cart->order());

        $order->save();

        $cart->empty();

        return redirect()->route('start');
    }
}
