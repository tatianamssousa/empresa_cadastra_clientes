@extends('base_layout')
@section('title', 'Formulario Produto')
@section('body')
    <form method="post" action="{{ isset($isUpdate) ? route('produtos.update', $produto->id) : route('produtos.store')}}">
        {{csrf_field()}}
        {{ isset($isUpdate) ? method_field('PUT') : "" }}
        Descrição:<input type="text" name="descricao" id="descricao" class="obrigatorio" value="{{ $produto->descricao }}"><br>
        Valor:<input type="text" name="valor" id="valor" class="obrigatorio" value="{{ $produto->valor }}"><br><br>
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