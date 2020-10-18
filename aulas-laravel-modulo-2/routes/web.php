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

//Para internet - cookies, sessions

//Route::get('/', function () {
//    return view('welcome');
//});

//Redirecionamento automático
//Route::redirect('/', '/teste');

//Route::get('/teste', function (){
//    return view('teste');
//});

//Carrega um view
//Route::view('/teste', 'teste');

//ROTAS COM APENAS UM ACTION
Route::get('/', 'HomeController');

//Rotas com parâmetros
Route::get('/noticia/{slug}', function ($slug){
    echo "Títilo: $slug";
});

Route::get('/noticia/{slug}/comentario/{id}', function($slug, $id){
    echo "Mostrando comentário: $id da notícia: $slug";
});

//Rotas com Regex + Provider(padronizar expressões regulares -> app->providers->RouteServiceProvider)
Route::get('/user/{id}', function ($id){
    echo "Mostrando usuário com id: $id";
});

Route::get('/user/{name}', function ($nome){
    echo "Mostrando usuário com nome: $nome";
})->where('name', '[a-z]+');

//Rotas com nome + Redirect e GRUPOS DE ROTAS
Route::prefix('/config')->group(function (){
    Route::get('/', 'Admin\ConfigController@index');
    Route::get('permissoes', 'Admin\ConfigController@permissoes')->name('permissoes');
    Route::get('info', 'Admin\ConfigController@info')->name('info');
});

//Rotas não estabelecidas
Route::fallback(function (){
    return view('404');
});



