<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;

class FrontController extends Controller
{
    public function home()
    {
        $drinks = Drink::paginate(21);

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
}
