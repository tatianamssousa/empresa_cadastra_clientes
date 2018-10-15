<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function produto(){
        return $this->belongsTo(Produto::class);
    }
    public function formaDePagamento(){
        return $this->belongsTo(FormaDePagamento::class, 'formaDePagamento_id');
    }
    public function situacao(){
        return $this->belongsTo(Situacao::class);
    }
}
