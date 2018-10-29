<div id="empresa" class="d-none">
    <div class="form-row">
        <div class="col-md-3 m-2">
            <b class="text-uppercase">Nome Fantasia:</b><input type="text" name="empresa_nome" id="empresa_nome" class="form-control" value="{{$empresa->nome}}">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 m-2">
            <b class="text-uppercase">Razão Social:</b><input type="text" name="empresa_razao" id="empresa_razao" class="obrigatorio empresa form-control" value="{{$empresa->razao}}">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 m-2">
            <b class="text-uppercase">CNPJ</b>:<input type="text" name="empresa_cnpj" id="empresa_cnpj" class="obrigatorio empresa form-control" value="{{$empresa->cnpj}}">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 m-2">
            <b class="text-uppercase">Inscrição Estadual:</b><input type="text" name="empresa_ie" id="empresa_ie" class="obrigatorio empresa form-control" value="{{$empresa->ie}}">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 m-2">
            <b class="text-uppercase">Email:</b><input type="text" name="empresa_email" id="empresa_email" class="obrigatorio empresa form-control" value="{{$empresa->email}}">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 m-2">
            <b class="text-uppercase">Bairro:</b><input type="text" name="empresa_bairro" id="empresa_bairro" class="obrigatorio empresa form-control" value="{{$empresa->bairro}}">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 m-2">
            <b class="text-uppercase">Número:</b><input type="text" name="empresa_numero" id="empresa_numero" class="obrigatorio empresa form-control" value="{{$empresa->numero}}">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 m-2">
            <b class="text-uppercase">Complemento:</b><input type="text" name="empresa_complemento" id="empresa_complemento" class="form-control" value="{{$empresa->complemento}}">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 m-2">
            <b class="text-uppercase">CEP:</b><input type="text" name="empresa_cep" id="empresa_cep" class="obrigatorio cep empresa form-control" value="{{$empresa->cep}}">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 m-2">
            <b class="text-uppercase">Cidade:</b><input type="text" name="empresa_cidade" id="empresa_cidade" class="obrigatorio empresa form-control" value="{{$empresa->cidade}}">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 m-2">
            <b class="text-uppercase">Estado:</b><input type="text" name="empresa_estado" id="empresa_estado" class="obrigatorio empresa form-control" value="{{$empresa->estado}}">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 m2">
            <b class="text-uppercase">Telefone:</b><input type="text" name="empresa_telefone" id="empresa_telefone" class="obrigatorio telefone empresa form-control" value="{{$empresa->telefone}}">
        </div>
    </div>
</div>
