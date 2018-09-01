@extends('base_layout')
@section('title', 'Index Cliente')
@section('body')
    @foreach($clientes as $cliente)
        Tipo:{{$cliente->tipo}}<br>
        Nome:{{$cliente->nome}}<br>
        CPF:{{$cliente->cpf}}<br>
        Nascimento:{{$cliente->nascimento}}<br>
        Email:{{$cliente->email}}<br>
        Logradouro:{{$cliente->logradouro}}<br>
        Bairro:{{$cliente->bairro}}<br>
        Número:{{$cliente->numero}}<br>
        Complemento:{{$cliente->complemento}}<br>
        CEP:{{$cliente->cep}}<br>
        Cidade:{{$cliente->cidade}}<br>
        Estado:{{$cliente->estado}}<br>
        Nacionalidade:{{$cliente->nacionalidade}}<br>
        Naturalidade:{{$cliente->naturalidade}}<br>
        Telefone:{{$cliente->telefone}}<br>
        Celular:{{$cliente->celular}}<br><br>
    @endforeach
@endsection