<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class RacoonController extends Controller
{
    public function show() {

        return Inertia::render('Racoon', [
            'randCount' => rand(10, 20),
            'color' => match(rand(1, 3)) {
                1 => 'skyblue',
                2 => 'crimson',
                3 => 'coral'
            }
        ]);
        
    }
}
