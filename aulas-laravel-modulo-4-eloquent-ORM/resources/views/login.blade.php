@extends('layouts.tarefas')

@section('title', 'Login')

@section('content')

    @lang('messeges.test')

    @if(session('warning'))
        @component('components.alert')
            @slot('type')
                Aviso:
            @endslot
            {{session('warning')}}
        @endcomponent
    @endif

    <form method="post">
        @csrf
        <label>
            Email: <br>
            <input name="email" type="email" placeholder="Digite seu email">
        </label><br><br>
        <label>
            Senha: <br>
            <input name="password" type="password" placeholder="****">
        </label><br><br>
        @if($tries >= 3)
{{--            {{__('messeges.tentativas', ['count'=>3])}}--}}
            @lang('messeges.tentativas', ['count'=>3])
        @else
            <input type="submit" value="Entrar">
        @endif
    </form>

    Tentativas: {{$tries}}
@endsection
