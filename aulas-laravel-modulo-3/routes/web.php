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

Route::prefix('/config')->group(function (){
    Route::get('/', 'Admin\ConfigController@index');
    Route::post('/', "Admin\ConfigController@index");
    Route::get('/permissoes', 'Admin\ConfigController@permissoes')->name('permissoes');
    Route::get('/info', 'Admin\ConfigController@info')->name('info');
});
