<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Inertia\Inertia;

use Illuminate\Http\Request;

class TravelController extends Controller
{

    public function index()
    {
        return Inertia::render('Travel/Travel', [
            'travelsData' => Travel::orderBy('id', 'desc')->get(),
            'storeUrl' => route('travel-store'),
            'deleteUrl' => route('travel-delete'),
            'updateUrl' => route('travel-update')
        ]);
    }

    public function store(Request $request)
    {
        // sleep(3);
        $id = Travel::create([
            'country' => $request->country,
            'hotel' => $request->hotel,
        ])->id;

        return response()->json([
            'message' => 'Hotel was added. Fancy One!',
            'messageType' => 'ok',
            'id' => $id
        ]);
    }


    public function update(Request $request, Travel $travel)
    {
        
        $travel->update($request->all());


        return response()->json([
            'message' => 'Hotel was upgraded. Now it is Fancy One!',
            'messageType' => 'ok',
        ]);
    }


    public function destroy(Travel $travel)
    {
        $travel->delete();
        
        return response()->json([
            'message' => 'Hotel was removed. Was fancy One!',
            'messageType' => 'not'
        ]);
    }
}
