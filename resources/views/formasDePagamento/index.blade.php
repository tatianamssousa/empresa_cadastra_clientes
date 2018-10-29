@extends('base_layout')
@section('title', 'Index Forma de pagamento')
@section('body')
    @foreach($formasDePagamento as $formaDePagamento)
        <b class="text-uppercase">Nome:</b>{{$formaDePagamento->nome}}<br>
        <div class="row">
        <form method="post" action="{{  route('formasDePagamento.destroy', [$formaDePagamento->id]) }}">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="DELETAR" class="btn btn-outline-secondary offset-md-2">
        </form>
        <form method="post" action="{{  route('formasDePagamento.edit', [$formaDePagamento->id]) }}">
            {{csrf_field()}}
            {{ method_field('GET') }}
            <input type="submit" value="EDITAR" class="btn btn-outline-primary offset-md-3">
        </form>
        </div>
    @endforeach
@endsection