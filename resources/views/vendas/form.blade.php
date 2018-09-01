@extends('base_layout')
@section('title', 'Formulario Venda')
@section('body')
    <form method="post" action="{{route('vendas.store')}}">
        {{csrf_field()}}
        Cliente:
            <select name="cliente" id="cliente" class="obrigatorio">
                <option value="">---</option>
                @foreach($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                @endforeach
            </select><br>
        Produto:
            <select name="produto" id="produto" class="obrigatorio">
                <option value="">---</option>
                @foreach($produtos as $produto)
                    <option value="{{$produto->id}}">{{$produto->descricao}}</option>
                @endforeach
            </select><br>
        Quantidade:
            <input type="text" name="quantidade" id="quantidade" class="obrigatorio"><br>
        Valor:
            <input type="text" name="valor" id="valor" class="obrigatorio"><br>
        Forma de pagamento:
            <select name="formaDePagamento" id="formaDePagamento" class="obrigatorio">
                <option value="">---</option>
                @foreach($formasDePagamento as $formaDePagamento)
                    <option value="{{$formaDePagamento->id}}">{{$formaDePagamento->nome}}</option>
                @endforeach
            </select><br>
        Vencimento:
            <input type="text" name="vencimento" id="vencimento" class="obrigatorio"><br><br>

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