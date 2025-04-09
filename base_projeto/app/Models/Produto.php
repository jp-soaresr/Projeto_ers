<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';
    protected $primaryKey = 'id';  
    protected $fillable = ['produto','estoque', 'valor', 'id_categoria', 'id_forma_pagamento'];

    public function categoria() 
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function formaPagamento() 
    {
        return $this->belongsTo(FormaPagamento::class, 'id_forma_pagamento');
    }
}
