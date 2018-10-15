@extends('base_layout')
@section('title', 'Index Venda')
@section('body')
    @foreach($vendas as $venda)
        Cliente:{{$venda->cliente->nome}}<br>
        Produto:{{$venda->produto->descricao}}<br>
        Quantidade:{{$venda->quantidade}}<br>
        Valor:{{$venda->valor}}<br>
        Forma de pagamento:{{$venda->formaDePagamento->nome}}<br>
        Vencimento:{{$venda->vencimento}}<br>
        Situação:{{$venda->situacao->situacao}}<br>
        <form method="post" action="{{  route('vendas.destroy', [$venda->id]) }}">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="DELETAR">
        </form>
        <form method="post" action="{{  route('vendas.edit', [$venda->id]) }}">
            {{csrf_field()}}
            {{ method_field('GET') }}
            <input type="submit" value="EDITAR">
        </form>
    @endforeach
@endsection