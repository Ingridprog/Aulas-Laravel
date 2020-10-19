@extends('layouts.tarefas')

@section('title', 'Listagem de tarefas')

@section('content')


    Olá, {{$user['name']}} - <a href="/logout">Sair</a>

    <h1>Listagem</h1>

    <a href="{{route('tarefas.add')}}">Criar Nova Tarefa</a><br><br>

    @if(session('warning'))
        @component('components.alert')
            @slot('type')
                Aviso:
            @endslot
            {{session('warning')}}
        @endcomponent
    @endif

    <table border="1" width="70%" align="center">
        <tr align="center">
            <th>ID</th>
            <th>Título</th>
            <th>Ações</th>
        </tr>
        @forelse($list as $item)
            <tr align="center">
                <td>{{$item->id}}</td>
                <td>{{$item->titulo}}</td>
                <td>
                    <a href="{{route('tarefas.done', ['id'=>$item->id])}}">
                        [@if($item->resolvido == 0) Marcar @else Desmarcar @endif]
                    </a>
                    <a href="{{route('tarefas.edit', ['id'=>$item->id])}}">[Editar]</a>
                    <a href="{{route('tarefas.delete', ['id'=>$item->id])}}" onclick="return confirm('Tem certeza que deseja excluir?')">
                        [Excluir]
                    </a>
                </td>
            </tr>
        @empty
            Não há itens
        @endforelse
    </table>
@endsection
