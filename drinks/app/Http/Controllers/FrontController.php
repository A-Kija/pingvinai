<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;

class FrontController extends Controller
{
    public function home()
    {
        $drinks = Drink::all();

        return view('front.home', [
            'drinks' => $drinks
        ]);
    }
}
