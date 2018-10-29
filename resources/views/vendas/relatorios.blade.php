@extends('base_layout')
@section('title','Relatórios de vendas')
@section('body')
    <form method="post" action="{{route('vendas.relatorios')}}">
        {{csrf_field()}}
        <div class="form-row">
            <div class="col-md-3 m-2">
                Data inicial:<input type="text" name="di" id="di" class="data form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                Data final:<input type="text" name="df" id="df" class="data form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 m-2">
                <div class="custom-control custom-radio">
                    @foreach($situacoes as $situacao )
                        <input type="checkbox" name="situacoes[]" value="{{ $situacao->id }}" class="situacao"><b class="text-uppercase">{{ $situacao->situacao }}</b><br>
                    @endforeach
                    <input type="checkbox" name="aberta" value="aberta" class="situacao"><b class="text-uppercase">Aberta</b><br>
                    <input type="checkbox" name="vencida" value="vencida" class="situacao"><b class="text-uppercase">Vencida</b><br><br>
                </div>
            </div>
        </div>
                    <input type="submit" value="Buscar" id="buscar" class="btn btn-primary offset-md-1">
    </form>
@endsection