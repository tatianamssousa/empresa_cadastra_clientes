@extends('base_layout')
@section('title', 'Formulario Forma de Pagamento')
@section('body')
    <form method="post" action="{{ isset($isUpdate) ? route('formasDePagamento.update', $formaDePagamento->id) : route('formasDePagamento.store')}}">
        {{csrf_field()}}
        {{ isset($isUpdate) ? method_field('PUT') : "" }}
        Nome:<input type="text" name="nome" id="nome" class="obrigatorio" value="{{$formaDePagamento->nome}}"><br><br>
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