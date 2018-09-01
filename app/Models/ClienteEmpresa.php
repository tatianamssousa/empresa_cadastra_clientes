<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteEmpresa extends Model
{
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }
    public function venda(){
        return $this->belongsTo(Venda::class);
    }
}
