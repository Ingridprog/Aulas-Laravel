@extends('layouts.tarefas')

@section('title', 'Configurações')

@section('content')

   Olá, {{$user['name']}} - <a href="/logout">Sair</a><br>

   <p>Bem-vindo a página de configurações</p>

   @if($seeform)
    <form>
        Nome: <br>
        <input name="name" type="text">
        <input type="submit" value="Salvar">
    </form>
   @endif
@endsection
