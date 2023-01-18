<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function showForm(Request $request)
    {
        $sum = $request->session()->pull('sum_result', 'no result');
        
        return view('post.form', [
            'sum' => $sum
        ]);
    }

    public function doForm(Request $request)
    {
        
        $validator = Validator::make(
            $request->all(),
            [
            'sum_x' => 'required|numeric|max:100',
            'sum_y' => 'required|numeric|max:100',
            ],
            [
                'sum_x.required' => 'Nu kažką praleidai',
                'sum_y.required' => 'Nu kažką praleidai',
                'sum_x.max' => 'Nu labai jau daug',
                'sum_y.max' => 'Nu labai jau daug'
            ]);

            $request->flash();

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

        $validator->after(function ($validator) use ($request) {
            if ($request->sum_x + $request->sum_y > 150) {
                $validator->errors()->add(
                    'x_y', 'Sum is to big!'
                );
            }
        });

        // $validator->after(fn ($validator) 
        // => $request->sum_x + $request->sum_y > 150 ? $validator->errors()->add('x_y', 'Sum is to big!') : null);



      

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        
        $sum = $request->sum_x + $request->sum_y;

        // dump($sum);

        // $request->session()->put('sum_result', $sum);

        $request->session()->flash('status', 'Task was successful!');
       

        return redirect()->route('show-form')->with('sum_result', $sum);
    }
}
