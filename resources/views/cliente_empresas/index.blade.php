@extends('base_layout')
@section('title', 'Index Cliente-Empresa')
@section('body')
    @foreach($cliente_empresas as $cliente_empresa)
        <b class="text-uppercase">Cliente:</b>{{$cliente_empresa->cliente->nome}}<br>
        <b class="text-uppercase">Empresa:</b>{{$cliente_empresa->empresa->nome}}<br>
        <b class="text-uppercase">Venda:</b>{{$cliente_empresa->venda->id}}<br>
        <div class="row">
            <form method="post" action="{{  route('cliente-empresas.destroy', [$cliente_empresa->id]) }}">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <input type="submit" value="DELETAR" class="btn btn-outline-secondary offset-md-2">
            </form>
            <form method="post" action="{{  route('cliente-empresas.edit', [$cliente_empresa->id]) }}">
                {{csrf_field()}}
                {{ method_field('GET') }}
                <input type="submit" value="EDITAR" class="btn btn-outline-primary offset-md-3">
            </form>
        </div>
    @endforeach
@endsection