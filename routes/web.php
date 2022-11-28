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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=> 'auth'],function (){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //***** Nivel Administrador *****//
    Route::group(['middleware' => ['auth', 'AdministradorCentral']], function () {
        Route::resource('registro_usuario', \App\Http\Controllers\registro_usuario\RegistroController::class);
        Route::resource('listado_usuario',\App\Http\Controllers\registro_usuario\ListadoUsuarioController::class);
        Route::resource('listado_roles', \App\Http\Controllers\registro_usuario\ListadoRolesController::class);

        Route::resource('clientes', \App\Http\Controllers\clientes\ClientesController::class);
    });

    //***** Nivel Presupuestos *****//
    Route::group(['middleware' => ['auth', 'Presupuestos']], function () {
        
    });

    //***** Nivel Tesoreria *****//
    Route::group(['middleware' => ['auth', 'Tesoreria']], function () {


    });

    //**** Nivel Contabilidad ****///
    Route::group(['middleware' => ['auth', 'Contabilidad']], function () {


    });
    //***** actualiza el nivel o rol del usuario ****//
    Route::resource('rol_usuario',\App\Http\Controllers\RolUsuarioController::class);

});
