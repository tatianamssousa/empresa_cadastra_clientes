@extends('base_layout')
@section('title', 'Index Empresa')
@section('body')
    @foreach($empresas as $empresa)
        <b class="text-uppercase">Nome Fantasia:</b>{{$empresa->nome}}<br>
        <b class="text-uppercase">Razão Social:</b>{{$empresa->razao}}<br>
        <b class="text-uppercase">CNPJ:</b>{{$empresa->cnpj}}<br>
        <b class="text-uppercase">Inscrição Estadual:</b>{{$empresa->ie}}<br>
        <b class="text-uppercase">Email:</b>{{$empresa->email}}<br>
        <b class="text-uppercase">Bairro:</b>{{$empresa->bairro}}<br>
        <b class="text-uppercase">Número:</b>{{$empresa->numero}}<br>
        <b class="text-uppercase">Complemento:</b>{{$empresa->complemento}}<br>
        <b class="text-uppercase">CEP:</b>{{$empresa->cep}}<br>
        <b class="text-uppercase">Cidade:</b>{{$empresa->cidade}}<br>
        <b class="text-uppercase">Estado:</b>{{$empresa->estado}}<br>
        <b class="text-uppercase">Telefone:</b>{{$empresa->telefone}}<br>
        <b class="text-uppercase">Representante Legal:</b>{{$empresa->cliente->nome}}<br>
        <div class="row">
        <form method="post" action="{{  route('empresas.destroy', [$empresa->id]) }}">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="DELETAR" class="btn btn-outline-secondary offset-md-2">
        </form>
        <form method="get" action="{{  route('empresas.edit', [$empresa->id]) }}">
            {{csrf_field()}}
            {{ method_field('EDIT') }}
            <input type="submit" value="EDITAR" class="btn btn-outline-primary offset-md-3">
        </form>
        </div>
    @endforeach
@endsection