<?php
//ROTAS E NAMESPACE
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

//importar o Controller
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function index()
    {
//        return redirect()->route('info');
        return view('config');
    }

    public function info()
    {
        return "info configurações...";
    }

    public function permissoes()
    {
        return "Configurações de permissões...";
    }
}
