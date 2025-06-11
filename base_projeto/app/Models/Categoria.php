<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    
    // Garanta que você tem isso para o Mass Assignment funcionar
    protected $fillable = ['categoria'];

    // ESTE É O MÉTODO IMPORTANTE PARA O GRÁFICO
    public function produtos()
    {
        // 'id_categoria' é a chave estrangeira na sua tabela de produtos
        return $this->hasMany(Produto::class, 'id_categoria');
    }
}