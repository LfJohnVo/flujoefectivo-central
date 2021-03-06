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

Route::get('/', 'Auth\LoginController@showLoginForm');
Auth::Routes();
Route::group(['middleware' => 'auth'],function (){
    Route::get('/home', 'HomeController@index')->middleware('verified');
    Route::resource('depositos', 'DepositoController');

    Route::resource('distritos', 'DistritoController');

    Route::resource('gerentes', 'GerenteController');

    Route::resource('proyectos', 'ProyectoController');

    Route::resource('rols', 'RolController');

    Route::resource('users', 'UserController');

    Route::resource('bancos', 'BancoController');

    Route::resource('distritals', 'distritalController');

    Route::get('/img/{id}', 'DepositoController@DownloadImg')->name('img');

    Route::resource('tipoDepositos', 'TipoDepositoController');

    Route::post('/reporte', 'HomeController@export')->name('reporte');
});

