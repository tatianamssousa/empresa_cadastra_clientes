@extends('base_layout')
@section('title', 'Index Venda')
@section('body')
    @foreach($vendas as $venda)
        Cliente:{{$venda->cliente->nome}}<br>
        Produto:{{$venda->produto->descricao}}<br>
        Quantidade:{{$venda->quantidade}}<br>
        Valor:{{$venda->valor}}<br>
        Forma de pagamento:{{$venda->formaDePagamento->nome}}<br>
        Vencimento:{{$venda->vencimento}}<br><br>
    @endforeach
@endsection