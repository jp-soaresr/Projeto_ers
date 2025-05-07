<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutosServico extends Model
{
    protected $fillable = ['id_produto', 'id_servico', 'quantidade', 'total'];

    public function produto() 
    {
        return $this->belongsTo(Produto::class, 'id_produto');
    }

    public function servico() 
    {
        return $this->belongsTo(Servico::class, 'id_servico');
    }
}
