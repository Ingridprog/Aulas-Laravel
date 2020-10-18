@extends('layouts.tarefas')

@section('title', 'Edição de tarefa')

@section('content')
    <h1>Editar tarefa</h1>

{{--    @if(session('warning'))--}}
{{--        @component('components.alert')--}}
{{--            @slot('type')--}}
{{--                Aviso:--}}
{{--            @endslot--}}
{{--            {{session('warning')}}--}}
{{--        @endcomponent--}}
{{--    @endif--}}

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
            <input name="titulo" type="text" value="{{$data->titulo}}">
        </label>
        <input type="submit" value="salvar">
    </form>

@endsection
