<?php

use Illuminate\Http\Request;

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
Route::get('/listarMarcas', 'MarcaController@getAll');
Route::get('/marca/get/{id}', 'MarcaController@show');
Route::post('/marca/update/{id}', 'MarcaController@update');
Route::post('/marca/store', 'MarcaController@store');