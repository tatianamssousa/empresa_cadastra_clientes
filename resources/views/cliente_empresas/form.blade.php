@extends('base_layout')
@section('title', 'Formulario Cliente-Empresa')
@section('body')
    <form method="post" action="{{route('cliente-empresas.store')}}">
        {{csrf_field()}}
        Cliente:
        <select name="cliente" id="cliente" class="obrigatorio">
            <option value="">---</option>
            @foreach($clientes as $cliente)
                <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
            @endforeach
        </select><br>
        Empresa:
        <select name="empresa" id="empresa" class="obrigatorio">
            <option value="">---</option>
            @foreach($empresas as $empresa)
                <option value="{{$empresa->id}}">{{$empresa->razao}}</option>
            @endforeach
        </select><br>
        Venda:
        <select name="venda" id="venda" class="obrigatorio">
            <option value="">---</option>
            @foreach($vendas as $venda)
                <option value="{{$venda->id}}">{{$venda->id}}</option>
            @endforeach
        </select><br><br>

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
        $('.obrigatorio').on('change', function () {
            verificarCampos();
        })
    </script>
@endsection