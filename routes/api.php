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
<<<<<<< HEAD

Route::get('/listarVeiculos', 'VeiculoController@getAll');
Route::get('/veiculo/get/{id}', 'VeiculoController@show');
Route::post('/veiculo/update/{id}', 'VeiculoController@update');
Route::post('/veiculo/store', 'VeiculoController@store');

=======
Route::get('/listarMarcas', 'MarcaController@getAll');
Route::get('/marca/get/{id}', 'MarcaController@show');
Route::post('/marca/update/{id}', 'MarcaController@update');
Route::post('/marca/store', 'MarcaController@store');
>>>>>>> d8e43c79559c058fcd743c1b509a2158819fdbfb
