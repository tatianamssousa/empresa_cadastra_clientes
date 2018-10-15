@extends('base_layout')
@section('title', 'Index Produto')
@section('body')
    @foreach($produtos as $produto)
        Descrição:{{$produto->descricao}}<br>
        Valor:{{$produto->valor}}<br>
        <form method="post" action="{{  route('produtos.destroy', [$produto->id]) }}">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="DELETAR">
        </form>
        <form method="post" action="{{  route('produtos.edit', [$produto->id]) }}">
            {{csrf_field()}}
            {{ method_field('GET') }}
            <input type="submit" value="EDITAR">
        </form>
        <form method="post" action="{{  route('produtos.update', [$produto->id]) }}">
            {{csrf_field()}}
            {{ method_field('put') }}
            <input type="submit" value="SALVAR EDITAR">
        </form>
    @endforeach
@endsection