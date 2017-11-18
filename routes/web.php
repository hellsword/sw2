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

//Route::get('usuarios.tarjeta.create','UserController@tarjeta_create');
//Route::post('usuarios.tarjeta.store','UserController@tarjeta_store');
//Route::post('/servicios/ver_anuncio','ServiciosController@ver_anuncio');

Route::post('/anuncios/ver_cupon','CuponController@verCupon');
Route::resource('/','HomeController');
Route::resource('/favoritos','FavoritoController');
Route::resource('/mis_anuncios','MisAnunciosController');
Route::resource('/servicios','ServiciosController');
//Route::resource('/auth','AuthController');
Route::resource('/auth','AuthController');
Route::resource('/usuarios','UserController');
Route::resource('usuarios_cliente','User2Controller');
Route::resource('/secretarias','SecretariaController');


Route::resource('/cupones','CuponController');

Route::resource('/anuncios','AnuncioController');


Auth::routes();
//para poder cerrar seccion

Route::get('/logout','Auth\LoginController@logout');

