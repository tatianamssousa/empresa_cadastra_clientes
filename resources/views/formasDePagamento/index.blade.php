@extends('base_layout')
@section('title', 'Index Forma de pagamento')
@section('body')
    @foreach($formasDePagamento as $formaDePagamento)
        Nome:{{$formaDePagamento->nome}}<br><br>
    @endforeach
@endsection