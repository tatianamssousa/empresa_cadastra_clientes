@extends('base_layout')
@section('title', 'Index Forma de pagamento')
@section('body')
    @foreach($formasDePagamento as $formaDePagamento)
        Nome:{{$formaDePagamento->nome}}<br>
        <form method="post" action="{{  route('formasDePagamento.destroy', [$formaDePagamento->id]) }}">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="DELETAR">
        </form>
        <form method="post" action="{{  route('formasDePagamento.edit', [$formaDePagamento->id]) }}">
            {{csrf_field()}}
            {{ method_field('GET') }}
            <input type="submit" value="EDITAR">
        </form>
    @endforeach
@endsection