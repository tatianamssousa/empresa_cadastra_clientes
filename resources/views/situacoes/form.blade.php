@extends('base_layout')
@section('title', 'Formulario Situação')
@section('body')
    <form method="post" action="{{ isset($isUpdate) ? route('situacoes.update', $situacao->id) :route('situacoes.store') }}">
        {{csrf_field()}}
        {{ isset($isUpdate) ? method_field('PUT') : "" }}
        Situação:<input type="text" name="situacao" id="situacao" value="{{$situacao->situacao}}" class="obrigatorio"><br><br>
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