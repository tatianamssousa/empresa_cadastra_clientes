@extends('base_layout')
@section('title', 'Index Produto')
@section('body')
    @foreach($produtos as $produto)
        <b class="text-uppercase">Descrição:</b>{{$produto->descricao}}<br>
        <b class="text-uppercase">Valor:</b>{{$produto->valor}}<br>
        <div class="row">
        <form method="post" action="{{  route('produtos.destroy', [$produto->id]) }}">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="DELETAR" class="btn btn-outline-secondary offset-md-2">
        </form>
        <form method="post" action="{{  route('produtos.edit', [$produto->id]) }}">
            {{csrf_field()}}
            {{ method_field('GET') }}
            <input type="submit" value="EDITAR" class="btn btn-outline-primary offset-md-3">
        </form>
        </div>
    @endforeach
@endsection