@extends('base_layout')
@section('title', 'Formulario Produto')
@section('body')
    <form method="post" action="{{ isset($isUpdate) ? route('produtos.update', $produto->id) : route('produtos.store')}}">
        {{csrf_field()}}
        {{ isset($isUpdate) ? method_field('PUT') : "" }}
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Descrição:</b><input type="text" name="descricao" id="descricao" class="obrigatorio form-control" value="{{ $produto->descricao }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Valor:</b><input type="text" name="valor" id="valor" class="obrigatorio form-control" value="{{ $produto->valor }}">
            </div>
        </div>
        <div>
            <input type="submit" value="Enviar" id="enviar" class="btn btn-primary col-md-1 offset-md-1">
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