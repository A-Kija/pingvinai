<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController as T;
use App\Http\Controllers\DrinkController as D;

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


Route::prefix('admin/types')->name('types-')->group(function () {
    Route::get('/', [T::class, 'index'])->name('index');
    Route::get('/create', [T::class, 'create'])->name('create');
    Route::post('/create', [T::class, 'store'])->name('store');
    Route::get('/edit/{type}', [T::class, 'edit'])->name('edit');
    Route::put('/edit/{type}', [T::class, 'update'])->name('update');
    Route::delete('/delete/{type}', [T::class, 'destroy'])->name('delete');
});

Route::prefix('admin/drinks')->name('drinks-')->group(function () {
    Route::get('/', [D::class, 'index'])->name('index');
    Route::get('/create', [D::class, 'create'])->name('create');
    Route::post('/create', [D::class, 'store'])->name('store');
    Route::get('/edit/{drink}', [D::class, 'edit'])->name('edit');
    Route::put('/edit/{drink}', [D::class, 'update'])->name('update');
    Route::delete('/delete/{drink}', [D::class, 'destroy'])->name('delete');
});



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
