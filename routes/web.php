<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'ControllerProducto@index')->name('pro.index');
Route::get('/adminProductos', 'ControllerProducto@adminProductos')->name('pro.adminProductos');

Route::get('/nuevoProducto', 'ControllerProducto@nuevoProducto')->name('pro.nuevoProducto');
Route::post('/nuevoRegistroProducto', 'ControllerProducto@nuevoRegistroProducto')->name('pro.nuevoRegistroProducto');

Route::post('/eliminarProducto', 'ControllerProducto@eliminarProducto')->name('pro.eliminarProducto');

Route::get('/editarProducto/{id}', 'ControllerProducto@editarProducto')->name('pro.editarProducto');
Route::post('/editarRegistroProducto', 'ControllerProducto@editarRegistroProducto')->name('pro.editarRegistroProducto');
