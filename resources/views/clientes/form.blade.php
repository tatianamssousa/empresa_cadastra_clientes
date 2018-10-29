@extends('base_layout')
@section('title', 'Formulario Cliente')
@section('body')
    <form  id="form-id" method="post" action="{{isset($isUpdate) ? route('clientes.update', $cliente->id) : route('clientes.store')}}">
        {{csrf_field()}}
        {{ isset($isUpdate) ? method_field('PUT') : "" }}
        <div class="row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Tipo:</b>
                <div class="custom-control custom-radio">
                    <input type="radio" name="tipo" id="tipo1" class="tipoPessoa" value="pf" checked>Pessoa Física
                    <input type="radio" name="tipo" id="tipo2" class="tipoPessoa" value="pj">Pessoa Jurídica<br><br>
                </div>
            </div>
        </div>
        @include('empresas.form')
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Nome:</b><input type="text" name="nome" id="nome" class="obrigatorio form-control nome" value="{{  $cliente->nome }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">CPF:</b><input type="text" name="cpf" id="cpf" class="obrigatorio form-control" value="{{ $cliente->cpf }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Nascimento:</b><input type="text" name="nascimento" id="nascimento" class="obrigatorio form-control" value="{{ $cliente->nascimento }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Email:</b><input type="text" name="email" id="email" class="obrigatorio form-control email" value="{{ $cliente->email }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Logradouro:</b><input type="text" name="logradouro" id="logradouro" class="obrigatorio form-control" value="{{ $cliente->logradouro }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Bairro:</b><input type="text" name="bairro" id="bairro" class="obrigatorio form-control" value="{{ $cliente->bairro }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Número:</b><input type="text" name="numero" id="numero" class="obrigatorio form-control" value="{{ $cliente->numero }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Complemento:</b><input type="text" name="complemento" id="complemento" class="form-control" value="{{ $cliente->complemento }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">CEP:</b><input type="text" name="cep" id="cep" class="obrigatorio cep form-control" value="{{ $cliente->cep }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Cidade:</b><input type="text" name="cidade" id="cidade" class="obrigatorio form-control" value="{{ $cliente->cidade }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Estado:</b><input type="text" name="estado" id="estado" class="obrigatorio form-control" value="{{ $cliente->estado }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Nacionalidade:</b><input type="text" name="nacionalidade" id="nacionalidade" class="obrigatorio form-control" value="{{ $cliente->nacionalidade }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Naturalidade:</b><input type="text" name="naturalidade" id="naturalidade" class="obrigatorio form-control" value="{{ $cliente->naturalidade }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Telefone:</b><input type="text" name="telefone" id="telefone" class="telefone form-control" value="{{ $cliente->telefone }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 m-2">
                <b class="text-uppercase">Celular:</b><input type="text" name="celular" id="celular" class="obrigatorio celular form-control" value="{{$cliente->celular}}">
            </div>
        </div>
        <div>
                <input type="submit" value="Enviar" id="enviar" class="btn btn-primary offset-md-1">
        </div>
    </form>
@endsection
@section('javascript')
    <script>
        $(".tipoPessoa").change(function() {
            if( $(this).val() == "pf" ){
                $('#empresa').addClass('d-none');
            }else {
                $('#empresa').removeClass('d-none');
            }
        })

    </script>
@endsection
@section('rodape')
    <script>
        function verificarCampos() {
            mostrarEnviar();
            $('.obrigatorio').each(function () {
                if ( $('.tipoPessoa:checked').val() == "pf" && $(this).hasClass('empresa') ) {
                    //console.log("Ignorado: " + $(this).attr('name'));
                } else if (!$(this).val()){
                    //console.log("Campo validado: " + $(this).attr('name') + " valor: " + $(this).val() );
                    esconderEnviar();
                }
            })
            $('.email').each(function () {
                if (($(this).val()+"").match(/^[\w\-\._]{1,}@[\w\.\-_]{1,}\.\w{3}$/gi)){
//                    console.log('validado');
                } else {
//                    console.log('desvalidado');
                    esconderEnviar();
                }
            })
            $('.nome').each(function () {
                if (($(this).val()+"").match(/[\w]{3,} [\w ]{3,}/gi)){

                }else {
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

        $('.tipoPessoa').change(function() {
            verificarCampos();
        })
    </script>
@endsection