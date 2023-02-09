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
    public function index(Request $request)
    {
        dump($request->sort);
        
        if (!$request->sort) {
            $travels = Travel::orderBy('id', 'desc')->get();
        } else {
            dump('-------',$request->sort);
            if ($request->sort == 'az') {
                dump('---',$request->sort);
                $travels = Travel::orderBy('country')->get();
            } else {
                $travels = Travel::orderBy('country', 'desc')->get();
            }
        }
        
        
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
            'message' => 'Hotel was added. Fancy One!',
            'messageType' => 'ok',
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

        $html = view('travel.edit')
        ->with(['travel' => $travel])
        ->render();

        return response()->json([
            'html' => $html,
            'to' => '--edit-bin'
        ]);

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
        $travel->update([
            'country' => $request->country,
            'hotel' => $request->hotel,
        ]);

        $travels = Travel::orderBy('id', 'desc')->get();

        $html = view('travel.list')
        ->with(['travels' => $travels])
        ->render();

        return response()->json([
            'message' => 'Hotel was Edited. Fancy One!',
            'messageType' => 'ok',
            'html' => $html,
            'to' => '--list',
            'delete' => '--edit-bin'
        ]);

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
            'messageType' => 'ok',
            'html' => $html,
            'to' => '--list'
        ]);
    }
}
