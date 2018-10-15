@extends('base_layout')
@section('title', 'Formulario Venda')
@section('body')
    <form method="post" action="{{ isset($isUpdate) ? route('vendas.update', $venda->id) : route('vendas.store')}}">
        {{csrf_field()}}
        {{ isset($isUpdate) ? method_field('PUT') : "" }}
        Cliente:
            <select name="cliente" id="cliente" class="obrigatorio">
                <option value="">---</option>
                @foreach($clientes as $cliente)
                    <option value="{{$cliente->id}}" {{ $venda->cliente_id == $cliente->id ? "selected" : "" }}>{{$cliente->nome}}</option>
                @endforeach
            </select><br>
        Produto:
            <select name="produto" id="produto" class="obrigatorio">
                <option value="">---</option>
                @foreach($produtos as $produto)
                    <option value="{{$produto->id}}" {{ $venda->produto_id == $produto->id ? "selected" : "" }}>{{$produto->descricao}}</option>
                @endforeach
            </select><br>
        Quantidade:
            <input type="text" name="quantidade" id="quantidade" class="obrigatorio" value="{{ $venda->quantidade }}"><br>
        Valor:
            <input type="text" name="valor" id="valor" class="obrigatorio" value="{{  $venda->valor }}"><br>
        Forma de pagamento:
            <select name="formaDePagamento" id="formaDePagamento" class="obrigatorio">
                <option value="">---</option>
                @foreach($formasDePagamento as $formaDePagamento)
                    <option value="{{$formaDePagamento->id}}" {{ $venda->formaDePagamento_id == $formaDePagamento->id ? "selected" : "" }}>{{$formaDePagamento->nome}}</option>
                @endforeach
            </select><br>
        Vencimento:
            <input type="text" name="vencimento" id="vencimento" class="obrigatorio" value="{{ $venda->vencimento }}"><br>
        Situação:
        <select name="situacao" id="situacao" class="obrigatorio">
            <option value="">---</option>
            @foreach($situacoes as $situacao)
                <option value="{{$situacao->id}}" {{ $venda->situacao_id == $situacao->id ? "selected" : "" }}>{{$situacao->situacao}}</option>
            @endforeach
        </select><br><br>

        <input type="submit" value="Enviar" id="enviar">
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