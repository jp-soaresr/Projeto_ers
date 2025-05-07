<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = ['nome', 'valor', 'data_inicio', 'data_fim', 'id_cliente', 'id_forma_pagamento'];

    public function cliente() 
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function formaPagamento() 
    {
        return $this->belongsTo(FormaPagamento::class, 'id_forma_pagamento');
    }
}
