<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = ['id_categoria', 'nome', 'valor_total', 'valor_mao_de_obra'];

    public function categoria() 
    {
        return $this->belongsTo(Categoria::class);
    }
}
