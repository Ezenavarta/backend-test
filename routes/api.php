<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('api/productos', 'ApiProductoController');
Route::get('/productos', 'ApiProductoController@index');
Route::get('/productos/{id}', 'ApiProductoController@show', );
Route::get('/productos/buscar/{clave}', 'ApiProductoController@find', );
