@extends('base_layout')
@section('title', 'Formulario Forma de Pagamento')
@section('body')
    <form method="post" action="{{ isset($isUpdate) ? route('formasDePagamento.update', $formaDePagamento->id) : route('formasDePagamento.store')}}">
        {{csrf_field()}}
        {{ isset($isUpdate) ? method_field('PUT') : "" }}
        <div class="col-md-3">
            <b class="text-uppercase">Nome:</b><input type="text" name="nome" id="nome" class="obrigatorio form-control" value="{{$formaDePagamento->nome}}"><br>
            <input type="submit" value="Enviar" id="enviar" class="btn btn-primary offset-md-4">
        </div>
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