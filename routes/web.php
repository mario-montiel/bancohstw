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

Route::get('/admin', 'verificar_buro_controller@admin');

/*
|--------------------------------------------------------------------------
| Rutas de administrador
|--------------------------------------------------------------------------
|
| En este grupo de rutas se colocaran todas las rutas a las que solo
| tiene acceso el administrador, tengan cuidado de añadir una ruta
| con un proceso que el usuario comun necesita hacer. Los quiero
|
*/
Route::group(['middleware' => ['userType', 'auth']], function () {
    //Ejemplo:
    //Route::get('/admin', 'admin@admin');
});
//>>>>>>>>>>>>rutas gestionar cliente
route::get('/gestionar_clientes','crudController@gestionar_clientes');
route::post('/guardar','crudController@crear_cliente');
route::get('/eliminar/{id}','crudController@eliminar');
route::post('/editar/{id}','crudController@editar');
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><>>>><<<>>>>>>

route::get('/ver_prestamos','prestamos_controller@ver_prestamos_view');

// rutas iony
route::get('/tarjetas', 'tarjetasController@tarjetas');