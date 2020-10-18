<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function index(Request $request)
    {
//        Request - Informações relacionadas a requisição
//        $url = $request->url();
//        $method = $request->method();

//        all - Pega todos dados de qualquer method, only - apenas os que eu quiser, execept - todos menos as exceções
//        $data = $request->except('_token');

//        query - Apenas da url - 2º parâmetro: dado padrão
//        $nome = $request->query('nome', 'Anônimo');

//        input - Prioriza o corpo da requisição, mas pega da url também
//        $idade = $request->input('idade');

//        2º parâmetro: dado padrão
        $nome = $request->input('nome', 'Anônimo');
        $idade = $request->input('idade', '0');
        $cidade = $request->input('cidade', "São Paulo");

//        has - verifica se tem, filled - verifica se está preenchido, missing - verifica se está faltando
        $estado = '';
        if(!$request->has('estado')){
            $estado = "São Paulo";
        }else{
            $estado = $request->input('estado');
        }

//        BLADE: RECEBENDO DADOS NO VIEW, OBS: Informações globais: App->Providers->AppServiceProvider

        $lista = [
            ['nome'=>'ovo', "qt"=>3],
            ['nome'=>'água', "qt"=>1],
            ['nome'=>'farinha de trigo', "qt"=>3],
            ['nome'=>'óleo', "qt"=>1],
            ['nome'=>'fermento', "qt"=>1],
            ['nome'=>'chocolate', "qt"=>3],
        ];

        $dados = [
            "nome" => $nome,
            "idade" => $idade,
            "cidade" => $cidade,
            "lista" => $lista
        ];

        return view('admin.config', $dados);
    }

    public function info()
    {
        return "Configurações info ...";
    }

    public function permissoes()
    {
        return "Configurações permissões ...";
    }
}
