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
        Representante Legal:{{$empresa->cliente->nome}}<br>
        <form method="post" action="{{  route('empresas.destroy', [$empresa->id]) }}">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="DELETAR">
        </form>
        <form method="get" action="{{  route('empresas.edit', [$empresa->id]) }}">
            {{csrf_field()}}
            {{ method_field('EDIT') }}
            <input type="submit" value="EDITAR">
        </form>
        <form method="put" action="{{  route('empresas.update', [$empresa->id]) }}">
            {{csrf_field()}}
            {{ method_field('UPDATE') }}
            <input type="submit" value="SALVAR EDITAR">
        </form>
    @endforeach
@endsection