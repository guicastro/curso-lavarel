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

Route::group(['prefix' => 'admin',
                'namespace' => 'Admin' //forma mais autormatizada de enviar o Namespace de todos no grupo, nesse caso não precisa utilizar Admin\ClientsController e sim apenas ClientsController com o Admin no namespace
                ], function() {
    Route::resource('clientes', 'ClientsController');
});
