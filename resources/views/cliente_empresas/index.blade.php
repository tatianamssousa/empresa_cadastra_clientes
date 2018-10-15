@extends('base_layout')
@section('title', 'Index Cliente-Empresa')
@section('body')
    @foreach($cliente_empresas as $cliente_empresa)
        <b>Cliente:</b>{{$cliente_empresa->cliente->nome}}<br>
        <b>Empresa:</b>{{$cliente_empresa->empresa->nome}}<br>
        <b>Venda:</b>{{$cliente_empresa->venda->id}}<br>
        <form method="post" action="{{  route('cliente-empresas.destroy', [$cliente_empresa->id]) }}">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="DELETAR" class="btn btn-outline-secondary">
        </form>
        <form method="post" action="{{  route('cliente-empresas.edit', [$cliente_empresa->id]) }}">
            {{csrf_field()}}
            {{ method_field('GET') }}
            <input type="submit" value="EDITAR" class="btn btn-outline-primary">
        </form>
    @endforeach
@endsection