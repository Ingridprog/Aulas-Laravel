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

//CRIANDO UM CRUD BÁSICO
Route::prefix('/tarefas')->group(function (){
    Route::get('/', 'TarefasController@index')->name('tarefas.index'); //Listagem de tarefas

    Route::get('add', 'TarefasController@add')->name('tarefas.add');//Adicionar tarefa - ir para o form
    Route::post('add', 'TarefasController@addAction'); //Ação de adição - form

    Route::get('edit/{id}', 'TarefasController@edit')->name('tarefas.edit'); //Editar tarefa - ir para o form
    Route::post('edit/{id}', 'TarefasController@editAction'); //Ação de edição - form

    Route::get('delete/{id}', 'TarefasController@delete')->name('tarefas.delete'); //Deletar tarefa

    Route::get('marcar/{id}', 'TarefasController@done')->name('tarefas.done'); //marcar tarefa como resolvida/não resolvida
});
