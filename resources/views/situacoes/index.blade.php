@extends('base_layout')
@section('title', 'Index Situação')
@section('body')
    @foreach($situacoes as $situacao)
        <b class="text-uppercase">Situação:</b>{{$situacao->situacao}}<br>
        <div class="row">
        <form method="post" action="{{  route('situacoes.destroy', [$situacao->id]) }}">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="DELETAR" class="btn btn-outline-secondary offset-md-2">
        </form>
        <form method="post" action="{{  route('situacoes.edit', [$situacao->id]) }}">
            {{csrf_field()}}
            {{ method_field('GET') }}
            <input type="submit" value="EDITAR" class="btn btn-outline-primary offset-md-3">
        </form>
        </div>
    @endforeach
@endsection