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
    return view('welcome');
});

Route::get('/verificar-burocredito', 'verificar_buro_controller@verificar_buro_credito');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'verificar_buro_controller@admin');

//Rutas de administrador
Route::group(['middleware' => ['userType', 'auth']], function () {
    Route::get('/admin', 'verificar_buro_controller@admin');
});
