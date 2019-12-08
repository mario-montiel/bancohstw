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

// RUTAS QUE DIRIGEN A LAS RESPECTIVAS VISTAS K HIZO CADA UNO >:v
//GESTIONAR CLIENTES
route::get('/gestionar_clientes','crudController@gestionar_clientes');
//AREA DE COBRANZA
route::get('/mostrar','crudController@gestionar');



Route::get('/', function () {
    return view('welcome');
});

// >>>>>>>>>>> RUTAS VERIFICAR CLIENTE EN EL BURO DE CREDITO  <<<<<<<<<<<<<<<<<
Route::get('/verificar-burocredito', 'verificar_buro_controller@verificar_buro_credito');
Route::get('/ver-usuarios', 'verificar_buro_controller@get_clientes');
Route::get('/verificar_nom_client', 'verificar_buro_controller@buscar_clientes');
Route::get('/buscar_clientes_curp', 'verificar_buro_controller@buscar_clientes_curp');
Route::get('/buscar_clientes_rfc', 'verificar_buro_controller@buscar_clientes_rfc');

Route::get('/asignar_prestamos', 'asignar_prestamos_controller@verVista');
Route::get('/verif_asignar_prestamos', 'asignar_prestamos_controller@verifClientBuroCredito');
Route::post('/x', 'asignar_prestamos_controller@asignarPrestamos');



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
--- PONGAN SUS PINCHES RUTAS AQUI
*/
Route::get('/verificar-burocredito', 'verificar_buro_controller@verificar_buro_credito');
/*
|--------------------------------------------------------------------------
| Rutas de usuario común
|--------------------------------------------------------------------------
|
| En este grupo de rutas se colocaran todas las rutas a las que solo
| tiene acceso el usuario normal, tengan cuidado de añadir una ruta
| con un proceso que el usuario administrador necesita hacer. Los quiero
|
--- PONGAN SUS PINCHES RUTAS AQUI
*/
Route::get('/asignar_prestamos', 'asignar_prestamos_controller@verVista');
/*
--- HASTA AQUÍ!
*/
/*====================================*/
/*rutas iony*/

// esta ruta es para otorgar las tarjetas a los clientes haciendo consultas
route::get('/tarjetas', 'tarjetasController@tarjetas');
route::post('/RFC1', 'tarjetasController@RFC1');
route::post('/curp1', 'tarjetasController@curp1');
route::post('/numero1', 'tarjetasController@numero1');
route::post('/nombre1', 'tarjetasController@nombre1');
route::post('/rfc2', 'tarjetasController@rfc2');
route::post('/curp2', 'tarjetasController@curp2');
route::post('/numero2', 'tarjetasController@numero2');
route::post('/nombre2', 'tarjetasController@nombre2');
route::post('/tarjetadebito', 'tarjetasController@tarjetadebito');
/*====================================*/


Route::group(['middleware' => ['userType', 'auth']], function () {
    //Ejemplo:
    //Route::get('/admin', 'admin@admin');
});
//>>>>>>>>>>>>rutas gestionar cliente

route::post('/guardar','crudController@crear_cliente');
route::get('/eliminar/{id}','crudController@eliminar');
route::post('/editar/{id}','crudController@editar');
route::get('/mostrar','crudController@gestionar');
//>>>>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<

//rutas de axel

//El cliente puede ver sus prestamos y sacar pdf apartir de estos
route::get('/ver_prestamos_lista','prestamos_controller@ver_prestamos_view_lista');
//generar pdf
route::post('/ver_prestamos','prestamos_controller@ver_prestamos_view');
route::get('/ver_prestamos_g/{id}','prestamos_controller@ver_prestamos_view2');
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


// rutas iony
route::get('/tarjetas', 'tarjetasController@tarjetas');

