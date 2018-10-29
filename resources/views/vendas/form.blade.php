@extends('base_layout')
@section('title', 'Formulario Venda')
@section('body')
    <form method="post" action="{{ isset($isUpdate) ? route('vendas.update', $venda->id) : route('vendas.store')}}">
        {{csrf_field()}}
        {{ isset($isUpdate) ? method_field('PUT') : "" }}
        <div class="row">
            <div class="offset-md-1 col-md-3">
                <b class="text-uppercase">Cliente:</b>
                <select name="cliente" id="cliente" class="obrigatorio custom-select">
                    <option value="">---</option>
                    @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}" {{ $venda->cliente_id == $cliente->id ? "selected" : "" }}>{{$cliente->nome}}</option>
                    @endforeach
                </select><br>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-1 col-md-3">
                <b class="text-uppercase">Produto:</b>
                <select name="produto" id="produto" class="obrigatorio custom-select">
                    <option value="">---</option>
                    @foreach($produtos as $produto)
                        <option value="{{$produto->id}}" {{ $venda->produto_id == $produto->id ? "selected" : "" }}>{{$produto->descricao}}</option>
                    @endforeach
                </select><br>
            </div>
        </div>
        <div class="form-row">
            <div class="offset-md-1 col-md-3">
                <b class="text-uppercase">Quantidade:</b>
                    <input type="text" name="quantidade" id="quantidade" class="obrigatorio form-control" value="{{ $venda->quantidade }}">
            </div>
        </div>
        <div class="form-row">
            <div class="offset-md-1 col-md-3">
                <b class="text-uppercase">Valor:</b>
                    <input type="text" name="valor" id="valor" class="obrigatorio form-control" value="{{  $venda->valor }}">
            </div>
        </div>
        <div class="row">
            <div class="offset-md-1 col-md-3">
                <b class="text-uppercase">Forma de pagamento:</b>
                <select name="formaDePagamento" id="formaDePagamento" class="obrigatorio custom-select">
                    <option value="">---</option>
                    @foreach($formasDePagamento as $formaDePagamento)
                        <option value="{{$formaDePagamento->id}}" {{ $venda->formaDePagamento_id == $formaDePagamento->id ? "selected" : "" }}>{{$formaDePagamento->nome}}</option>
                    @endforeach
                </select><br>
            </div>
        </div>
        <div class="form-row">
            <div class="offset-md-1 col-md-3">
                <b class="text-uppercase">Vencimento:</b>
                    <input type="text" name="vencimento" id="vencimento" class="obrigatorio form-control" value="{{ $venda->vencimento }}">
            </div>
        </div>
        <div class="row">
            <div class="offset-md-1 col-md-3">
                <b class="text-uppercase">Situação:</b>
                <select name="situacao" id="situacao" class="obrigatorio custom-select">
                    <option value="">---</option>
                    @foreach($situacoes as $situacao)
                        <option value="{{$situacao->id}}" {{ $venda->situacao_id == $situacao->id ? "selected" : "" }}>{{$situacao->situacao}}</option>
                    @endforeach
                </select><br><br>
            </div>
        </div>

        <input type="submit" value="Enviar" id="enviar" class="btn btn-primary offset-md-2">
    </form>
@endsection
@section('rodape')
    <script>
        function verificarCampos() {
            console.log('enviar');

            mostrarEnviar();
            $('.obrigatorio').each(function () {
                if (!$(this).val()){
                    esconderEnviar();
                }
            })
        }
        function mostrarEnviar() {
            $('#enviar').show();
        }
        function esconderEnviar() {
            $('#enviar').hide();
        }
        verificarCampos();
        $('.obrigatorio').on('keyup change', function () {
            verificarCampos();
        })
    </script>
@endsection