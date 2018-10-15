@extends('base_layout')
@section('title', 'Formulario Cliente')
@section('body')
    <form  id="form-id" method="post" action="{{isset($isUpdate) ? route('clientes.update', $cliente->id) : route('clientes.store')}}">
        {{csrf_field()}}
        {{ isset($isUpdate) ? method_field('PUT') : "" }}
        Tipo:
            <input type="radio" name="tipo" id="tipo1" class="tipoPessoa" value="pf" checked>Pessoa Física
            <input type="radio" name="tipo" id="tipo2" class="tipoPessoa" value="pj">Pessoa Jurídica<br><br>
        @include('empresas.form')
        Nome:<input type="text" name="nome" id="nome" class="obrigatorio" value="{{  $cliente->nome }}"><br>
        CPF:<input type="text" name="cpf" id="cpf" class="obrigatorio" value="{{ $cliente->cpf }}"><br>
        Nascimento:<input type="text" name="nascimento" id="nascimento" class="obrigatorio" value="{{ $cliente->nascimento }}"><br>
        Email:<input type="text" name="email" id="email" class="obrigatorio" value="{{ $cliente->email }}"><br>
        Logradouro:<input type="text" name="logradouro" id="logradouro" class="obrigatorio" value="{{ $cliente->logradouro }}"><br>
        Bairro:<input type="text" name="bairro" id="bairro" class="obrigatorio" value="{{ $cliente->bairro }}"><br>
        Número:<input type="text" name="numero" id="numero" class="obrigatorio" value="{{ $cliente->numero }}"><br>
        Complemento:<input type="text" name="complemento" id="complemento" value="{{ $cliente->complemento }}"><br>
        CEP:<input type="text" name="cep" id="cep" class="obrigatorio cep" value="{{ $cliente->cep }}"><br>
        Cidade:<input type="text" name="cidade" id="cidade" class="obrigatorio" value="{{ $cliente->cidade }}"><br>
        Estado:<input type="text" name="estado" id="estado" class="obrigatorio" value="{{ $cliente->estado }}"><br>
        Nacionalidade:<input type="text" name="nacionalidade" id="nacionalidade" class="obrigatorio" value="{{ $cliente->nacionalidade }}"><br>
        Naturalidade:<input type="text" name="naturalidade" id="naturalidade" class="obrigatorio" value="{{ $cliente->naturalidade }}"><br>
        Telefone:<input type="text" name="telefone" id="telefone" class="telefone" value="{{ $cliente->telefone }}"><br>
        Celular:<input type="text" name="celular" id="celular" class="obrigatorio celular" value="{{ $cliente->celular }}"><br><br>
            <input type="submit" value="Enviar" id="enviar">
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
                    console.log("Ignorado: " + $(this).attr('name'));
                } else if (!$(this).val()){
                    console.log("Campo validado: " + $(this).attr('name') + " valor: " + $(this).val() );
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