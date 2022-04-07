<?php

use Illuminate\Support\Facades\Route;

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
//
//Route::get('/', function () {
//    return view('components.header');
//});

Route::get('/', function () {

    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::post('submit', [\App\Http\Controllers\GSTController::class, 'store']);

Route::get('/view',[\App\Http\Controllers\GSTController::class,'show'])->middleware('auth')->name('view');

Route::get('gst/{gst}/edit',[\App\Http\Controllers\GSTController::class,'edit'])->middleware('auth');

Route::patch('gst/{gst}/update',[\App\Http\Controllers\GSTController::class,'update'])->middleware('auth');

Route::delete('gst/{gst}/delete',[\App\Http\Controllers\GSTController::class,'destroy'])->middleware('auth');
