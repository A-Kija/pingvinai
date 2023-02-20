<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Intervention\Image\ImageManager;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $perPageShow = in_array($request->per_page, Drink::PER_PAGE) ? $request->per_page : 'all';
        if (!$request->s) {
        
            if ($request->type_id && $request->type_id != 'all') {
                $drinks = Drink::where('type_id', $request->type_id);
            }
            else {
                $drinks = Drink::where('id', '>', 0);
            } 
                    
            $drinks = match($request->sort ?? '') {
                'asc_name' => $drinks->orderBy('title'),
                'desc_name' => $drinks->orderBy('title', 'desc'),
                'asc_size' => $drinks->orderBy('size'),
                'desc_size' => $drinks->orderBy('size', 'desc'),
                default => $drinks
            };

            
            if ($perPageShow == 'all') {
                $drinks = $drinks->get();
            } else {
                $drinks = $drinks->paginate($perPageShow)->withQueryString();
            }
        }
        else {
            $s = explode(' ', $request->s);

            if ( count($s) == 1) {
                $drinks = Drink::where('title', 'like', '%'.$request->s.'%')->get();
            }
            else {
                $drinks = Drink::where('title', 'like', '%'.$s[0].'%'.$s[1].'%')
                ->orWhere('title', 'like', '%'.$s[1].'%'.$s[0].'%')
                ->get();
            }
        }
        
    
        // $drinks = Drink::all()->sortBy('price');
        // $drinks = Drink::all()->sortByDesc('price');

        $types = Type::all()->sortBy('title');

        return view('back.drinks.index', [
            'drinks' => $drinks,
            'sortSelect' => Drink::SORT,
            'sortShow' => isset(Drink::SORT[$request->sort]) ? $request->sort : '',
            'perPageSelect' => Drink::PER_PAGE,
            'perPageShow' => $perPageShow,
            'types' => $types,
            'typeShow' => $request->type_id ? $request->type_id : '',
            's' => $request->s ?? ''
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

        
        $validator = Validator::make(
            $request->all(),
            [
            'drink_title' => 'required|alpha|min:3|max:100|regex:/^T/',
            'drink_size' => 'required|min:1|max:9999',
            'drink_price' => 'required|decimal:0,2|min:0|max:999',
            'type_id' => 'required|numeric|min:1',
            'drink_vol' => 'sometimes|decimal:0,1|min:1|max:99',
            ]);

            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }
        
        $drink = new Drink;


        if ($request->file('photo')) {
            $photo = $request->file('photo');

            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            
            $manager = new ImageManager(['driver' => 'gd']);

            $image = $manager->make($photo);
            $image->crop(400, 600);
            $image->save(public_path().'/drinks/'.$file);
            

            // $photo->move(public_path().'/drinks', $file);

            $drink->photo = '/drinks/' . $file;

        }

       



        $type = Type::find($request->type_id);
        $vol = $type->is_alk ? $request->drink_vol : null;

        $drink->title = $request->drink_title;
        $drink->type_id = $request->type_id;
        $drink->size = $request->drink_size;
        $drink->price = $request->drink_price;
        $drink->desc = $request->drink_desc;
        $drink->vol = $vol;

        $drink->save();

        return redirect()->route('drinks-index')->with('ok', 'New drink was created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function show(Drink $drink)
    {
        return view('back.drinks.show', ['drink' => $drink]);
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
        
        if ($request->delete_photo) {
            $drink->deletePhoto();
            return redirect()->back()->with('ok', 'Photo was deleted');
        }
       
        
        $validator = Validator::make(
            $request->all(),
            [
            'drink_title' => 'required|min:3|max:100',
            'drink_size' => 'required|min:1|max:9999',
            'drink_price' => 'required|decimal:0,2|min:0|max:999',
            'type_id' => 'required|numeric|min:1',
            'drink_vol' => 'sometimes|decimal:0,1|min:1|max:99',
            ]);

            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }

        $type = Type::find($request->type_id);
        $vol = $type->is_alk ? $request->drink_vol : null;

        if ($request->file('photo')) {
            $photo = $request->file('photo');

            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            
            $manager = new ImageManager(['driver' => 'gd']);

            $image = $manager->make($photo);
            $image->crop(400, 600);

            // $photo->move(public_path().'/drinks', $file);

            // $drink->photo = '/drinks/' . $file;

            if ($drink->photo) {
                $drink->deletePhoto();
            }
            // $photo->move(public_path().'/drinks', $file);
            $image->save(public_path().'/drinks/'.$file);
            $drink->photo = '/drinks/' . $file;
        }

        
        $drink->title = $request->drink_title;
        $drink->type_id = $request->type_id;
        $drink->size = $request->drink_size;
        $drink->price = $request->drink_price;
        $drink->desc = $request->drink_desc;
        $drink->vol = $vol;

        $drink->save();

        return redirect()->route('drinks-index')->with('ok', 'Drink was edited');
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
        return redirect()->back()->with('ok', 'Drink was deleted');
    }


    public function pdf(Drink $drink)
    {
        $pdf = Pdf::loadView('back.drinks.pdf', ['drink' => $drink]);
        return $pdf->download($drink->title.'.pdf');
    }

}
