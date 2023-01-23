<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\Type;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = Drink::all()->sortBy('price');

        return view('back.drinks.index', [
            'drinks' => $drinks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all()->sortBy('title');

        $alkIds = json_encode($types->filter(fn($t) => $t->is_alk)->pluck('id')->all());

        return view('back.drinks.create', [
            'types' => $types,
            'alkIds' => $alkIds 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drink = new Drink;

        $type = Type::find($request->type_id);
        $vol = $type->is_alk ? $request->drink_vol : null;

        $drink->title = $request->drink_title;
        $drink->type_id = $request->type_id;
        $drink->size = $request->drink_size;
        $drink->price = $request->drink_price;
        $drink->vol = $vol;

        $drink->save();

        return redirect()->route('drinks-index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function show(Drink $drink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function edit(Drink $drink)
    {
        $types = Type::all()->sortBy('title');

        $alkIds = json_encode($types->filter(fn($t) => $t->is_alk)->pluck('id')->all());

        return view('back.drinks.edit', [
            'drink' => $drink,
            'types' => $types,
            'alkIds' => $alkIds 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drink $drink)
    {
        
        $type = Type::find($request->type_id);
        $vol = $type->is_alk ? $request->drink_vol : null;
        
        $drink->title = $request->drink_title;
        $drink->type_id = $request->type_id;
        $drink->size = $request->drink_size;
        $drink->price = $request->drink_price;
        $drink->vol = $vol;

        $drink->save();

        return redirect()->route('drinks-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drink $drink)
    {
        $drink->delete();
        return redirect()->route('drinks-index');
    }
}
