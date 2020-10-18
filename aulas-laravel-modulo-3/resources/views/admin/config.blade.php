{{--BLADE: Definindo template--}}
@extends('layouts.admin')

@section('title', 'Configurações')
@section('content')
<h1>Configurações</h1>

{{--DEFININDO COMPONENTES--}}
{{--@component('components.alert')--}}
{{--    @slot('type')--}}
{{--        Aviso:--}}
{{--    @endslot--}}
{{--    Configurações carregadas com sucesso!--}}
{{--@endcomponent--}}

{{--COMPONENTES COM ATALHO--}}
@alert
    @slot('type')
        Aviso:
    @endslot
    Configurações carregadas com sucesso!
@endalert

Nome: {{$nome}}, Idade: {{$idade}}<br>

@if($idade < 18)
    Menor de idade
@else
    Maior de idade
@endif

<br>

{{--Dado global--}}
@isset($version)
    Versão: {{$version}}
@endisset

@empty($estado)
    <br>Estado não definido!
@endempty

<br><br>
<form method="post">

{{-- proteção --}}
    @csrf

    Nome: <br>
    <input name="nome" type="text"><br><br>
    Idade: <br>
    <input type="text" name="idade"><br><br>

    Cidade: <br>
    <input type="text" name="cidade"><br><br>

    <input type="submit" value="Salvar">
</form>
<hr>
Bolo de chocolate
<ul>
{{-- Foreach com condicional --}}
    @forelse($lista as $ingrediente)
        <li>{{$ingrediente['nome']}} - {{$ingrediente['qt']}}</li>
    @empty
        <li>Não há ingredientes</li>
    @endforelse
</ul>

@endsection
