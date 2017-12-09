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

Route::get('/usuarios/adm_categorias','UserController@adm_categorias');
Route::get('/usuarios/gestion','UserController@gestion');
Route::get('/usuarios/secretarias','UserController@filtro');

Route::post('/anuncios/actualizar','AnuncioController@actualizar');
Route::post('/anuncios/ver_cupon','CuponController@verCupon');
Route::post('/favoritos/almacenar','FavoritoController@almacenar');

//Rutas para categorias
Route::post('/usuarios/nueva_categoria','UserController@nueva_categoria');
Route::post('/usuarios/nueva_sub_categoria','UserController@nueva_sub_categoria');
Route::post('/usuarios/actualiza_categoria','UserController@actualiza_categoria');
Route::post('/usuarios/elimina_categoria','UserController@elimina_categoria');
Route::post('/usuarios/actualiza_sub_categoria','UserController@actualiza_sub_categoria');
Route::post('/usuarios/elimina_sub_categoria','UserController@elimina_sub_categoria');
Route::post('/usuarios/actualiza_relacion','UserController@actualiza_relacion');
Route::post('/usuarios/nueva_categoria_vehiculo','UserController@nueva_categoria_vehiculo');
Route::post('/usuarios/actualiza_categoria_vehiculo','UserController@actualiza_categoria_vehiculo');
Route::post('/usuarios/elimina_categoria_vehiculo','UserController@elimina_categoria_vehiculo');


Route::resource('/anuncios','AnuncioController');
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




Auth::routes();
//para poder cerrar seccion

Route::get('/logout','Auth\LoginController@logout');

