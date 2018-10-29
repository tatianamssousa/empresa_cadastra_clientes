@extends('base_layout')
@section('title', 'Index Venda')
@section('body')
    @foreach($vendas as $venda)
        <b class="text-uppercase">Cliente:</b>{{$venda->cliente->nome}}<br>
        <b class="text-uppercase">Produto:</b>{{$venda->produto->descricao}}<br>
        <b class="text-uppercase">Quantidade:</b>{{$venda->quantidade}}<br>
        <b class="text-uppercase">Valor:</b>{{$venda->valor}}<br>
        <b class="text-uppercase">Forma de pagamento:</b>{{$venda->formaDePagamento->nome}}<br>
        <b class="text-uppercase">Vencimento:</b>{{$venda->vencimento}}<br>
        <b class="text-uppercase">Situação:</b>{{$venda->situacao->situacao}}<br>
        <div class="row">
        <form method="post" action="{{  route('vendas.destroy', [$venda->id]) }}">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="DELETAR" class="btn btn-outline-secondary offset-md-2">
        </form>
        <form method="post" action="{{  route('vendas.edit', [$venda->id]) }}">
            {{csrf_field()}}
            {{ method_field('GET') }}
            <input type="submit" value="EDITAR" class="btn btn-outline-primary offset-md-3">
        </form>
        </div>
    @endforeach
@endsection