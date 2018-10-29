@extends('base_layout')
@section('title', 'Index Cliente')
@section('body')
    @foreach($clientes as $cliente)
        <b class="text-uppercase">Tipo:</b>{{$cliente->tipo}}<br>
        <b class="text-uppercase">Nome:</b>{{$cliente->nome}}<br>
        <b class="text-uppercase">CPF:</b>{{$cliente->cpf}}<br>
        <b class="text-uppercase">Nascimento:</b>{{$cliente->nascimento}}<br>
        <b class="text-uppercase">Email:</b>{{$cliente->email}}<br>
        <b class="text-uppercase">Logradouro:</b>{{$cliente->logradouro}}<br>
        <b class="text-uppercase">Bairro:</b>{{$cliente->bairro}}<br>
        <b class="text-uppercase">Número:</b>{{$cliente->numero}}<br>
        <b class="text-uppercase">Complemento:</b>{{$cliente->complemento}}<br>
        <b class="text-uppercase">CEP:</b>{{$cliente->cep}}<br>
        <b class="text-uppercase">Cidade:</b>{{$cliente->cidade}}<br>
        <b class="text-uppercase">Estado:</b>{{$cliente->estado}}<br>
        <b class="text-uppercase">Nacionalidade:</b>{{$cliente->nacionalidade}}<br>
        <b class="text-uppercase">Naturalidade:</b>{{$cliente->naturalidade}}<br>
        <b class="text-uppercase">Telefone:</b>{{$cliente->telefone}}<br>
        <b class="text-uppercase">Celular:</b>{{$cliente->celular}}<br>
        <div class="row">
            <form method="post" action="{{  route('clientes.destroy', [$cliente->id]) }}">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <input type="submit" value="DELETAR" class="btn btn-outline-secondary offset-md-2">
            </form>
            <form method="post" action="{{  route('clientes.edit', [$cliente->id]) }}">
                {{csrf_field()}}
                {{ method_field('GET') }}
                <input type="submit" value="EDITAR" class="btn btn-outline-primary offset-md-3">
            </form>
        </div>
    @endforeach
@endsection