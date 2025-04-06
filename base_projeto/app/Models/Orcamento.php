<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    use HasFactory;

    protected $fillable = ['id_cliente', 'id_forma_pagamento', 'data_inicio', 'data_final', 'placa_veiculo', 'modelo_veiculo', 'marca', 'valor_total'];

    public function cliente() 
    {
        return $this->belongsTo(Cliente::class);
    }

    public function formaPagamento() 
    {
        return $this->belongsTo(FormaPagamento::class);
    }
}
