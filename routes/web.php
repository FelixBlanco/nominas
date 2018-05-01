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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Empleados
Route::resource('empleados','EmpleadosController');
Route::get('info-empleado/{EmpleadoId}','EmpleadosController@infoEmpleado')->name('info-empleado/{EmpleadoId}');
Route::get('getempleados','EmpleadosController@getEmpleados')->name('getempleados');
Route::get('delete-empleado/{id}','EmpleadosController@destroy')->name('delete-empleado/{id}');

// Producto & Precio 
// --- Producto
Route::get('producto-precio','ProductoPrecioController@index')->name('producto-precio');
Route::get('get-productos','ProductoPrecioController@getProductos')->name('get-productos');
Route::get('info-productos/{id}','ProductoPrecioController@infoProductos')->name('info-productos/{id}');
Route::post('store-tipo-producto','ProductoPrecioController@storeProducto')->name('store-tipo-producto');

// --- Precio
Route::get('get-precios','ProductoPrecioController@getPrecios')->name('get-precios');
Route::post('store-precio','ProductoPrecioController@storePrecio')->name('store-precio');

// Bancos Empleados
Route::get('bancos','BancosController@index')->name('bancos');
Route::get('get-bancos','BancosController@get')->name('get-bancos');
Route::post('add-banco','BancosController@store')->name('add-banco');

// Cuentas
Route::get('cuenta','DeudasAbonosController@index')->name('cuenta');
Route::get('totales/{id}','DeudasAbonosController@totales')->name('totales/{id}');

// Deuda
Route::post('add-deuda','DeudasAbonosController@addDeudas')->name('add-deuda'); 
Route::get('get-deudas/{idEmpleado}','DeudasAbonosController@getDeudas')->name('get-deudas/{idEmpleado}');
Route::get('delete-deudas/{id}','DeudasAbonosController@destroyDeudas')->name('delete-deudas/{id}');

// Abonos
Route::post('add-abono','DeudasAbonosController@addAbonos')->name('add-abono'); 
Route::get('get-abono/{idEmpleado}','DeudasAbonosController@getAbonos')->name('get-abono/{idEmpleado}');
Route::get('delete-abonos/{id}','DeudasAbonosController@destroyAbonos')->name('delete-abonos/{id}');

// Cargar productos
Route::get('cargar','CargaProductoController@index')->name('cargar');
Route::get('total-sacos/{empleadoId}/{tipoProducto}','CargaProductoController@totalSacos')->name('total-sacos/{empleadoId}/{tipoProducto}');
Route::get('get-carga/{empleado}','CargaProductoController@getCargas')->name('get-carga/{empleado}');
Route::get('get-productos/{id}/{producto}','CargaProductoController@getProductos')->name('get-productos/{id}/{producto}');
Route::post('add-carga','CargaProductoController@addProductos')->name('add-carga');
Route::get('deleteCarga/{id}','CargaProductoController@deleteCarga')->name('deleteCarga/{id}');

// Pagos 
Route::get('pagar','PagoController@index')->name('pagar');
Route::post('add-pagar','PagoController@add')->name('add-pagar');
