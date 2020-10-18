<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Acesso ao banco de dados
use Illuminate\Support\Facades\DB;
//importar model
use App\Tarefa;

class TarefasController extends Controller
{
    public function index()
    {
//        $list = DB::select('SELECT * FROM tarefas');
        $list = Tarefa::all();

        return view('tarefas.index', [
            'list' => $list
        ]);
    }

    public function add()
    {
        return view('tarefas.add');
    }

    public function addAction(Request $request)
    {
        $request->validate([
            'titulo' => ['required','string']
        ]);

        $titulo = $request->input('titulo');

//        DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', ['titulo'=>$titulo]);

        $tarefa = new Tarefa();
        $tarefa->titulo = $titulo;
        $tarefa->save();


        return redirect()->route('tarefas.index');
    }

    public function edit($id)
    {
//        $item = DB::select('SELECT * FROM tarefas WHERE id = :id', ['id'=>$id]);

        $item = Tarefa::find($id);

        if($item){
            return view('tarefas.edit', [
                'data'=>$item
            ]);
        }else{
            return redirect()->route('tarefas.index');
        }

    }

    public function editAction($id, Request $request)
    {
        $request->validate([
            'titulo'=> ['required', 'string']
        ]);

        $titulo = $request->input('titulo');

//        DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
//                    'titulo'=>$titulo,
//                    'id'=>$id]);

//        $tarefa = Tarefa::find($id);
//        $tarefa->titulo = $titulo;
//        $tarefa->save();

        Tarefa::find($id)->update(['titulo'=>$titulo]);

        return redirect()->route('tarefas.index');
    }

    public function delete($id)
    {
        $tarefa = Tarefa::find($id);
        if($tarefa){
            $tarefa->delete();
        }
        
        return redirect()->route('tarefas.index');
    }

    public function done($id)
    {
//        DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
//            'id'=>$id]);

        $tarefa = Tarefa::find($id);
        if($tarefa){
            $tarefa->resolvido = 1 - $tarefa->resolvido;
            $tarefa->save();
        }

        return redirect()->route('tarefas.index');
    }
}
