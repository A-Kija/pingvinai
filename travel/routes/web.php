<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelController as T;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin/travel')->name('travel-')->group(function () {
    Route::get('/', [T::class, 'index'])->name('index');
    Route::post('/create', [T::class, 'store'])->name('store');
    Route::get('/edit/{travel}', [T::class, 'edit'])->name('edit');
    Route::put('/edit/{travel}', [T::class, 'update'])->name('update');
    Route::delete('/delete/{travel}', [T::class, 'destroy'])->name('delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
