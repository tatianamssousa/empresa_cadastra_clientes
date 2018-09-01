@extends('base_layout')
@section('title', 'Index Cliente-Empresa')
@section('body')
    @foreach($cliente_empresas as $cliente_empresa)
        Cliente:{{$cliente_empresa->cliente->nome}}<br>
        Empresa:{{$cliente_empresa->empresa->nome}}<br>
        Venda:{{$cliente_empresa->venda->id}}<br><br>
    @endforeach
@endsection