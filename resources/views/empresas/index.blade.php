@extends('base_layout')
@section('title', 'Index Empresa')
@section('body')
    @foreach($empresas as $empresa)
        Nome Fantasia:{{$empresa->nome}}<br>
        Razão Social:{{$empresa->razao}}<br>
        CNPJ:{{$empresa->cnpj}}<br>
        Inscrição Estadual:{{$empresa->ie}}<br>
        Email:{{$empresa->email}}<br>
        Bairro:{{$empresa->bairro}}<br>
        Número:{{$empresa->numero}}<br>
        Complemento:{{$empresa->complemento}}<br>
        CEP:{{$empresa->cep}}<br>
        Cidade:{{$empresa->cidade}}<br>
        Estado:{{$empresa->estado}}<br>
        Telefone:{{$empresa->telefone}}<br>
        Representante Legal:{{$empresa->cliente->nome}}<br><br>
    @endforeach
@endsection