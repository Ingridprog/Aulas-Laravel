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
//MIDDLEWARE NO CONTROLLER tarefasController
Route::prefix('/tarefas')->group(function (){
    Route::get('/', 'TarefasController@index')->name('tarefas.index'); //Listagem de tarefas

    Route::get('add', 'TarefasController@add')->name('tarefas.add');//Adicionar tarefa - ir para o form
    Route::post('add', 'TarefasController@addAction'); //Ação de adição - form

    Route::get('edit/{id}', 'TarefasController@edit')->name('tarefas.edit'); //Editar tarefa - ir para o form
    Route::post('edit/{id}', 'TarefasController@editAction'); //Ação de edição - form

    Route::get('delete/{id}', 'TarefasController@delete')->name('tarefas.delete'); //Deletar tarefa

    Route::get('marcar/{id}', 'TarefasController@done')->name('tarefas.done'); //marcar tarefa como resolvida/não resolvida
});

//RESOURCE CONTROLLER
Route::resource('todo', 'TodoController');

//GET    - /todo - index - todo.index - LISTA OS ITENS
//GET    - /todo/create - create - todo.create - FORM DE CRIAÇÃO
//POST   - /todo - store - todo.store - RECEBER DADOS E ADD ITEM
//GET    - /todo/{id} - show - todo.show - ITEM INDIVIDUAL
//GET    - /todo/{id}/edit - edit - todo.edit - FORM EDIÇÃO
//PUT    - /todo/{id} - update - todo.update - RECEBER DADOS E ATUALIZAR ITEM
//DELETE - /todo/{id}/ - destroy - todo.destroy - DELETETAR ITEM


//MIDDLEWARE

//login
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@authenticate');

//Registro
Route::get('/register','Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

//Só é acessível se estiver logado - se não estiver ele redireciona para a rota login
//Se não estiver autenticado - Middleware\Authenticate - se estiver Middleware\RedirectlfAuthenticate
//Authorization - Providers->AuthServiceProvider
Route::get('/config', function (\Illuminate\Http\Request $request){
    $user = $request->user();
   return view('config', [
       'user'=>$user,
       'seeform'=>\Illuminate\Support\Facades\Gate::allows('see-form')]);
})->name('config')->middleware('auth');

Route::get('/logout', 'Auth\LoginController@logout');
