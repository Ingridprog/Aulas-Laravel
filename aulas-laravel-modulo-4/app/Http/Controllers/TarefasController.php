<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Acesso ao banco de dados
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{
    public function index()
    {
        $list = DB::select('SELECT * FROM tarefas');
//        $list = DB::select('SELECT * FROM tarefas WHERE resolvido = :status', ['status'=>1]);
//        $list = DB::select('SELECT * from tarefas WHERE id = ?', ['1']);

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
//        if($request->filled('titulo')){
//            $titulo = $request->input('titulo');
//
//            DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', ['titulo'=>$titulo]);
//
//            return redirect()->route('tarefas.index');
//        }else{
//            return redirect()
//                ->route('tarefas.add')
//                ->with('warning', 'Preencha o campo título corretamente!');
//        }

//        VALIDAÇÕES

        $request->validate([
            'titulo' => ['required','string']
        ]);

//        Caso não valide o laravel retorna para a url anterior(add) com mensagem de erro pronta e adicionada na sessão

        $titulo = $request->input('titulo');

        DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', ['titulo'=>$titulo]);

        return redirect()->route('tarefas.index');
    }

    public function edit($id)
    {
        $item = DB::select('SELECT * FROM tarefas WHERE id = :id', ['id'=>$id]);

        if(count($item) > 0){
            return view('tarefas.edit', [
                'data'=>$item[0]
            ]);
        }else{
            return redirect()->route('tarefas.index');
        }

    }

    public function editAction($id, Request $request)
    {
//        if($request->filled('titulo')){
//            $item = DB::select('SELECT * FROM tarefas WHERE id = :id', ['id'=>$id]);
//
//            if(count($item) > 0){
//                DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
//                    'titulo'=>$request['titulo'],
//                    'id'=>$id]);
//            }
//
//            return redirect()->route('tarefas.index');
//        }else{
//            return redirect()
//                ->route('tarefas.edit', ['id'=>$id])
//                ->with('warning', 'Preencha o campo titulo corretamente!');
//        }

//        VALIDAÇÕES

        $request->validate([
            'titulo'=> ['required', 'string']
        ]);

        $titulo = $request->input('titulo');

        DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
                    'titulo'=>$titulo,
                    'id'=>$id]);

        return redirect()->route('tarefas.index');
    }

    public function delete($id)
    {
        $item = DB::select('SELECT * FROM tarefas WHERE id = :id', ['id'=>$id]);

        if(count($item) > 0){
            DB::delete('DELETE FROM tarefas WHERE id = :id', ['id'=>$id]);
        }

        return redirect()->route('tarefas.index');
    }

    public function done($id)
    {
        DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
            'id'=>$id]);

        return redirect()->route('tarefas.index');
    }
}
