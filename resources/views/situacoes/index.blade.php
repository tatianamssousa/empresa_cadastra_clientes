@extends('base_layout')
@section('title', 'Index Situação')
@section('body')
    @foreach($situacoes as $situacao)
        Situação:{{$situacao->situacao}}<br>
        <form method="post" action="{{  route('situacoes.destroy', [$situacao->id]) }}">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="DELETAR">
        </form>
        <form method="post" action="{{  route('situacoes.edit', [$situacao->id]) }}">
            {{csrf_field()}}
            {{ method_field('GET') }}
            <input type="submit" value="EDITAR">
        </form>
    @endforeach
@endsection