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
            'deleteUrl' => route('travel-delete')
        ]);
    }

    public function store(Request $request)
    {
        sleep(3);
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTravelRequest  $request
     * @param  \App\Models\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTravelRequest $request, Travel $travel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Travel $travel)
    {
        $travel->delete();
        
        return response()->json([
            'message' => 'Hotel was removed. Was fancy One!',
            'messageType' => 'not'
        ]);
    }
}
