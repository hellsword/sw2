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

Route::resource('/','HomeController');
Route::resource('/servicios','ServiciosController');
//Route::resource('/auth','AuthController');
Route::resource('/auth','AuthController');
Route::resource('/usuarios','UserController');
Route::resource('usuarios_cliente','User2Controller');
Route::resource('/secretarias','SecretariaController');

Route::resource('/anuncios','AnuncioController');
Auth::routes();
//para poder cerrar seccion

Route::get('/logout','Auth\LoginController@logout');

