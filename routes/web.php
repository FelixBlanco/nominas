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
Route::get('getempleados','EmpleadosController@getEmpleados')->name('getempleados');
Route::get('delete-empleado/{id}','EmpleadosController@destroy')->name('delete-empleado/{id}');

// Producto & Precio 
// --- Producto
Route::get('producto-precio','ProductoPrecioController@index')->name('producto-precio');
Route::get('get-productos','ProductoPrecioController@getProductos')->name('get-productos');
Route::post('store-tipo-producto','ProductoPrecioController@storeProducto')->name('store-tipo-producto');

// --- Precio
Route::get('get-precios','ProductoPrecioController@getPrecios')->name('get-precios');
Route::post('store-precio','ProductoPrecioController@storePrecio')->name('store-precio');