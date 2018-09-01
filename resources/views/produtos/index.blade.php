@extends('base_layout')
@section('title', 'Index Produto')
@section('body')
    @foreach($produtos as $produto)
        Descrição:{{$produto->descricao}}<br>
        Valor:{{$produto->valor}}<br><br>
    @endforeach
@endsection