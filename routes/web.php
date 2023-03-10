<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use GuzzleHttp\Middleware;

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
    return view('auth.login');
});
/* 
Route::get('/producto', function () {
    return view('producto.index');
});

Route::get('/producto/create',[ProductoController::class,'create']); */

Route::resource('producto',ProductoController::class)->middleware('auth');

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [ProductoController::class, 'index'])->name('home');


Route::group(['Middleware' => 'auth'], function() {
    Route::get('/', [ProductoController::class, 'index'])->name('home');

});