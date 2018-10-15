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
        Celular:{{$cliente->celular}}<br>
        <form method="post" action="{{  route('clientes.destroy', [$cliente->id]) }}">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="DELETAR">
        </form>
        <form method="post" action="{{  route('clientes.edit', [$cliente->id]) }}">
            {{csrf_field()}}
            {{ method_field('GET') }}
            <input type="submit" value="EDITAR">
        </form>
        <form method="post" action="{{  route('clientes.update', [$cliente->id]) }}">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <input type="submit" value="SALVAR EDITAR">
        </form>
    @endforeach
@endsection