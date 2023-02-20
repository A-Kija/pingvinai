<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function list() {
        $response = Http::get('https://dummyjson.com/products');

        $all = $response->json();

        $products = collect($all['products']);

  
        $products = $products->map(fn($p) => (object)$p);
  

        return view('list', ['products' => $products]);

    }

    public function category($cat) {

        $response = Http::get('https://dummyjson.com/products/category/' . $cat);

        $all = $response->json();

        $products = collect($all['products']);

  
        $products = $products->map(fn($p) => (object)$p);

   

        return view('list', ['products' => $products]);

    }
}
