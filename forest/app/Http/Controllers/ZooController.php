<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZooController extends Controller
{
    public function enter(Request $request, $id, $a)
    {
        // dump($request);
        
        return 'Versija: '. $request->v.$request->bb .' Labas iš kontrolerio Nr.: ' . $id.$a;
    }
}
