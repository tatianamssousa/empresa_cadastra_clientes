<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    public function getEmpresaAttribute() {
        $empresa = new Empresa();
        if ( $this->tipo == "pj") {
            $clienteEmpresa = ClienteEmpresa::where('cliente_id', $this->id)->first();
            dd( $clienteEmpresa );
            $empresa = $clienteEmpresa->empresa;
        }
        return $empresa;
    }
}
