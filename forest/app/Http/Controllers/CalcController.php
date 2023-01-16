<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function do(Request $request, $x, $y)
    {
        return match($request->action) {
            'add' => $x + $y,
            'div' => $x / $y,
            'diff' => $x - $y,
            'mult' => $x * $y,
            default => 'error'
        };
    }
}
