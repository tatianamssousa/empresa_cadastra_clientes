@extends('base_layout')
@section('title', 'Formulario Cliente-Empresa')
@section('body')
    <form method="post" action="{{ isset($isUpdate) ? route('cliente-empresas.update', $cliente_empresa->id) : route('cliente-empresas.store')}}">
        {{csrf_field()}}
        {{ isset($isUpdate) ? method_field('PUT') : "" }}
        <div class="row">
            <div class=" offset-md-3 col-md-5">
                <b class="text-uppercase">Cliente:</b>
                <select name="cliente" id="cliente" class="obrigatorio custom-select border border-secondary">
                    <option value="">---</option>
                    @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}" {{ $cliente_empresa->cliente_id == $cliente->id ? "selected" : "" }}>{{$cliente->nome}}</option>
                    @endforeach
                </select><br>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-5">
                <b class="text-uppercase">Empresa:</b>
                <select name="empresa" id="empresa" class="obrigatorio custom-select border border-secondary">
                    <option value="">---</option>
                    @foreach($empresas as $empresa)
                        <option value="{{$empresa->id}}" {{ $cliente_empresa->empresa_id == $empresa->id ? "selected" : "" }}>{{$empresa->razao}}</option>
                    @endforeach
                </select><br>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-5">
                <b class="text-uppercase">Venda:</b>
                <select name="venda" id="venda" class="obrigatorio custom-select border border-secondary">
                    <option value="">---</option>
                    @foreach($vendas as $venda)
                        <option value="{{$venda->id}}" {{ $cliente_empresa->venda_id == $venda->id ? "selected" : "" }}>{{$venda->id}}</option>
                    @endforeach
                </select><br><br>
            </div>
        </div>
        <input type="submit" value="Enviar" id="enviar" class="btn btn-primary offset-md-5">
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