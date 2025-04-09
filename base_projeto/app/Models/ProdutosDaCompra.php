<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutosDaCompra extends Model
{
    use HasFactory;

    protected $fillable = ['id_cliente', 'id_produto'];

    public function cliente() 
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function produto() 
    {
        return $this->belongsTo(Produto::class, 'id_produto');
    }
}
