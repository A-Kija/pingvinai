<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all()->sortBy('title');
        return view('back.types.index', [
            'types' => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make(
            $request->all(),
            [
            'type_title' => 'required|min:3|max:100',
            'is_alk' => 'sometimes|numeric|min:1|max:1',
            ]);

            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }
        
        $type = new Type;
        $type->title = $request->type_title;
        $type->is_alk = $request->is_alk ?? 0;
        $type->save();

        return redirect()->route('types-index')->with('ok', 'New type was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('back.types.edit', [
            'type' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        
        $validator = Validator::make(
            $request->all(),
            [
            'type_title' => 'required|min:3|max:100',
            'is_alk' => 'sometimes|numeric|min:1|max:1',
            ]);

            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }
        
        
        $type->title = $request->type_title;
        $type->is_alk = $request->is_alk ?? 0;
        $type->save();

        return redirect()->route('types-index')->with('ok', 'Type was edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        if (!$type->typeDrinks()->count()) {
            $type->delete();
            return redirect()->route('types-index')->with('ok', 'Type was deleted');
        }
        return redirect()->back()->with('not', 'Type has drinks.');
    }
}
