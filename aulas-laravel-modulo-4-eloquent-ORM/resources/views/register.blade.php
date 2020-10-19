@extends('layouts.tarefas')

@section('title', 'Cadastro')

@section('content')

    @if($errors->any())
        @component('components.alert')
            @slot('type')
                ERRO(S):
            @endslot
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endcomponent
    @endif

    <form method="post">
        @csrf
        <label>
            Nome: <br>
            <input name="name" type="text" placeholder="Digite seu nome" value="{{old('name')}}">
        </label><br><br>
        <label>
            Email: <br>
            <input name="email" type="email" placeholder="Digite seu email" value="{{old('email')}}">
        </label><br><br>
        <label>
            Senha: <br>
            <input name="password" type="password" placeholder="****">
        </label><br><br>
        <label>
            Confirmar Senha: <br>
            <input name="password_confirmation" type="password" placeholder="confirme a senha">
        </label><br><br>
        <input type="submit" value="Cadastrar">
    </form>
@endsection
