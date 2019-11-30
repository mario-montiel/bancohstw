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
Route::get('/ver-usuarios', 'verificar_buro_controller@get_clientes');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//>>>>>>>>>>>>rutas gestionar cliente
route::get('/gestionar_clientes','crudController@gestionar_clientes');
route::post('/guardar','crudController@crear_cliente');
route::get('/eliminar/{id}','crudController@eliminar');
route::post('/editar/{id}','crudController@editar');
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><>>>><<<>>>>>>

route::get('/ver_prestamos','prestamos_controller@ver_prestamos_view');
