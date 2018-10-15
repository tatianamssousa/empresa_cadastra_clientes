@extends('base_layout')
@section('title', 'Formulario Cliente-Empresa')
@section('body')
    <form method="post" action="{{ isset($isUpdate) ? route('cliente-empresas.update', $cliente_empresa->id) : route('cliente-empresas.store')}}">
        {{csrf_field()}}
        {{ isset($isUpdate) ? method_field('PUT') : "" }}
        Cliente:
        <select name="cliente" id="cliente" class="obrigatorio">
            <option value="">---</option>
            @foreach($clientes as $cliente)
                <option value="{{$cliente->id}}" {{ $cliente_empresa->cliente_id == $cliente->id ? "selected" : "" }}>{{$cliente->nome}}</option>
            @endforeach
        </select><br>
        Empresa:
        <select name="empresa" id="empresa" class="obrigatorio">
            <option value="">---</option>
            @foreach($empresas as $empresa)
                <option value="{{$empresa->id}}" {{ $cliente_empresa->empresa_id == $empresa->id ? "selected" : "" }}>{{$empresa->razao}}</option>
            @endforeach
        </select><br>
        Venda:
        <select name="venda" id="venda" class="obrigatorio">
            <option value="">---</option>
            @foreach($vendas as $venda)
                <option value="{{$venda->id}}" {{ $cliente_empresa->venda_id == $venda->id ? "selected" : "" }}>{{$venda->id}}</option>
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