<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;


class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travels = Travel::orderBy('id', 'desc')->get();
        
        return view('travel.index', ['travels' => $travels]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Travel::insert([
            'country' => $request->country,
            'hotel' => $request->hotel,
        ]);

        $travels = Travel::orderBy('id', 'desc')->get();

        $html = view('travel.list')
        ->with(['travels' => $travels])
        ->render();

        return response()->json([
            'message' => 'Fancy One!',
            'html' => $html,
            'to' => '--list'
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function edit(Travel $travel)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Travel $travel)
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

        $travels = Travel::orderBy('id', 'desc')->get();

        $html = view('travel.list')
        ->with(['travels' => $travels])
        ->render();

        return response()->json([
            'message' => 'Dead One!',
            'html' => $html,
            'to' => '--list'
        ]);
    }
}
