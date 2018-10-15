@extends('base_layout')
@section('title','Relatórios de vendas')
@section('body')
    <form method="post" action="{{route('vendas.relatorios')}}">
        {{csrf_field()}}
        Data inicial:<input type="text" name="di" id="di" class="data"><br>
        Data final:<input type="text" name="df" id="df" class="data"><br>
        @foreach($situacoes as $situacao )
            <input type="checkbox" name="situacoes[]" value="{{ $situacao->id }}" class="situacao">{{ $situacao->situacao }}<br>
        @endforeach
        <input type="checkbox" name="aberta" value="aberta" class="situacao">Aberta<br>
        <input type="checkbox" name="vencida" value="vencida" class="situacao">Vencida<br><br>
        <input type="submit" value="Buscar" id="buscar">
    </form>
@endsection