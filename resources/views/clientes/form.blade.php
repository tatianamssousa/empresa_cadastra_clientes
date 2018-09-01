@extends('base_layout')
@section('title', 'Formulario Cliente')
@section('body')
    <form  id="form-id" method="post" action="{{route('clientes.store')}}">
        {{csrf_field()}}
        Tipo:
            <input type="radio" name="tipo" id="tipo1" class="tipoPessoa" value="pf" checked>Pessoa Física
            <input type="radio" name="tipo" id="tipo2" class="tipoPessoa" value="pj">Pessoa Jurídica<br><br>
        @include('empresas.form')
        Nome:<input type="text" name="nome" id="nome" class="obrigatorio"><br>
        CPF:<input type="text" name="cpf" id="cpf" class="obrigatorio"><br>
        Nascimento:<input type="text" name="nascimento" id="nascimento" class="obrigatorio"><br>
        Email:<input type="text" name="email" id="email" class="obrigatorio"><br>
        Logradouro:<input type="text" name="logradouro" id="logradouro" class="obrigatorio"><br>
        Bairro:<input type="text" name="bairro" id="bairro" class="obrigatorio"><br>
        Número:<input type="text" name="numero" id="numero" class="obrigatorio"><br>
        Complemento:<input type="text" name="complemento" id="complemento"><br>
        CEP:<input type="text" name="cep" id="cep" class="obrigatorio cep"><br>
        Cidade:<input type="text" name="cidade" id="cidade" class="obrigatorio"><br>
        Estado:<input type="text" name="estado" id="estado" class="obrigatorio"><br>
        Nacionalidade:<input type="text" name="nacionalidade" id="nacionalidade" class="obrigatorio"><br>
        Naturalidade:<input type="text" name="naturalidade" id="naturalidade" class="obrigatorio"><br>
        Telefone:<input type="text" name="telefone" id="telefone" class="telefone" br>
        Celular:<input type="text" name="celular" id="celular" class="obrigatorio celular"><br><br>
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