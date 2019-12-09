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

// >>>>>>>>>>>  RUTAS VERIFICAR CLIENTE EN EL BURO DE CREDITO  <<<<<<<<<<<<<<<<<
Route::get('/verificar-burocredito', 'verificar_buro_controller@verificar_buro_credito');
Route::get('/ver-usuarios', 'verificar_buro_controller@get_clientes');
Route::get('/verificar_nom_client', 'verificar_buro_controller@buscar_clientes');
Route::get('/buscar_clientes_curp', 'verificar_buro_controller@buscar_clientes_curp');
Route::get('/buscar_clientes_rfc', 'verificar_buro_controller@buscar_clientes_rfc');

// >>>>>>>>>>>  RUTAS ASIGNAR PRESTAMOS   <<<<<<<<<<<<<<<<<
// Route::get('/verif_asignar_prestamos', 'asignar_prestamos_controller@verifClientBuroCredito');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'verificar_buro_controller@admin');


/*--- PONGAN SUS PINCHES RUTAS AQUI
*/
//El admi puede verificar si alguien esta en buro de crédito
Route::get('/verificar-burocredito', 'verificar_buro_controller@verificar_buro_credito');
//El usuario común podrá acceder para poder solicitar un préstamo
Route::get('/asignar_prestamos', 'asignar_prestamos_controller@verVista');
// En estas rutas no se puede acceder directamente por el usuario comun
Route::get('/asignar_prestamo', 'asignar_prestamos_controller@verVista2');
Route::post('/verif_sol_prestamo', 'asignar_prestamos_controller@asignarPrestamos');
Route::post('/prestamo_solicitado', 'asignar_prestamos_controller@prestamoSolicitado');


/*rutas iony*/
// estas rutas son para otorgar las tarjetas a los clientes haciendo consultas
route::get('/tarjetas', 'tarjetasController@tarjetas');
// estas rutas son para consultarme si el bato está en buró de credito dependiendo de los datos k ingrese
//								||
//							    \/
route::post('/RFC1', 'tarjetasController@RFC1');
route::post('/curp1', 'tarjetasController@curp1');
route::post('/numero1', 'tarjetasController@numero1');
route::post('/nombre1', 'tarjetasController@nombre1');
route::post('/rfc2', 'tarjetasController@rfc2');
route::post('/curp2', 'tarjetasController@curp2');
route::post('/numero2', 'tarjetasController@numero2');
route::post('/nombre2', 'tarjetasController@nombre2');
route::post('/tarjetadebito', 'tarjetasController@tarjetadebito');



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

