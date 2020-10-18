@extends('layouts.tarefas')

@section('title', 'Criar tarefa')

@section('content')
    <h1>Adiconar tarefa</h1>

{{-- Só é lida uma vez e some da sessão --}}
{{--    @if(session('warning'))--}}
{{--        @component('components.alert')--}}
{{--            @slot('type')--}}
{{--                Aviso:--}}
{{--            @endslot--}}
{{--            {{session('warning')}}--}}
{{--        @endcomponent--}}
{{--    @endif--}}

{{-- Se houver qualquer erro --}}
    @if($errors->any())
        @component('components.alert')
            @foreach($errors->all() as $err)
                @slot('type')
                    ERRO:
                @endslot
                {{$err}}<br>
            @endforeach
        @endcomponent
    @endif

    <form method="POST">
        @csrf
        <label>
            Título: <br>
            <input name="titulo" type="text">
        </label>
        <input type="submit" value="salvar">
    </form>
@endsection
