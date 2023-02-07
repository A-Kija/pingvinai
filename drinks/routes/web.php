<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController as T;
use App\Http\Controllers\DrinkController as D;
use App\Http\Controllers\FrontController as F;
use App\Http\Controllers\OrderController as O;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [F::class, 'home'])->name('start');
Route::get('/drink/{drink}', [F::class, 'showDrink'])->name('show-drink');
Route::get('/cat/{type}', [F::class, 'showCatDrinks'])->name('show-cats-drinks');
Route::post('/add-to-cart', [F::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart', [F::class, 'cart'])->name('cart');
Route::post('/cart', [F::class, 'updateCart'])->name('update-cart');
Route::post('/make-order', [F::class, 'makeOrder'])->name('make-order');


Route::prefix('admin/types')->name('types-')->group(function () {
    Route::get('/', [T::class, 'index'])->name('index')->middleware('roles:A|M');
    Route::get('/create', [T::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/create', [T::class, 'store'])->name('store')->middleware('roles:A');
    Route::get('/edit/{type}', [T::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/edit/{type}', [T::class, 'update'])->name('update')->middleware('roles:A');
    Route::delete('/delete/{type}', [T::class, 'destroy'])->name('delete')->middleware('roles:A');
});

Route::prefix('admin/drinks')->name('drinks-')->group(function () {
    Route::get('/', [D::class, 'index'])->name('index')->middleware('roles:A|M');
    Route::get('/show/{drink}', [D::class, 'show'])->name('show')->middleware('roles:A|M');
    Route::get('/pdf/{drink}', [D::class, 'pdf'])->name('pdf')->middleware('roles:A|M');
    Route::get('/create', [D::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/create', [D::class, 'store'])->name('store')->middleware('roles:A');
    Route::get('/edit/{drink}', [D::class, 'edit'])->name('edit')->middleware('roles:A|M');
    Route::put('/edit/{drink}', [D::class, 'update'])->name('update')->middleware('roles:A|M');
    Route::delete('/delete/{drink}', [D::class, 'destroy'])->name('delete')->middleware('roles:A');
});

Route::prefix('admin/orders')->name('orders-')->group(function () {
    Route::get('/', [O::class, 'index'])->name('index')->middleware('roles:A|M');
    Route::put('/edit/{order}', [O::class, 'update'])->name('update')->middleware('roles:A');
    Route::delete('/delete/{order}', [O::class, 'destroy'])->name('delete')->middleware('roles:A');
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
