<?php

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
    return view('index');
});

Route::get('listarVeiculos', 'VeiculoController@getAll');
Route::get('/veiculo/get/{id}', 'VeiculoController@show');
Route::post('/veiculo/update/{id}', 'VeiculoController@update');
Route::post('/veiculo/store', 'VeiculoController@store');

Route::get('/listarMarcas', 'MarcaController@getAll');
Route::get('/marca/get/{id}', 'MarcaController@show');
Route::post('/marca/update/{id}', 'MarcaController@update');
Route::post('/marca/store', 'MarcaController@store');