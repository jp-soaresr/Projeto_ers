<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoDoServico extends Model
{
    use HasFactory;

    protected $fillable = ['id_produto', 'id_servico','quantidade', 'valor_total'];

    public function produtos() 
    {
        return $this->belongsTo(Produto::class);
    }

    public function servico() 
    {
        return $this->belongsTo(Servico::class);
    }
}
