@extends('base_layout')
@section('title', 'Formulario Produto')
@section('body')
    <form method="post" action="{{route('produtos.store')}}">
        {{csrf_field()}}
        Descrição:<input type="text" name="descricao" id="descricao" class="obrigatorio"><br>
        Valor:<input type="text" name="valor" id="valor" class="obrigatorio"><br><br>
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
        $('.obrigatorio').on('keyup', function () {
            verificarCampos();
        })
    </script>
@endsection