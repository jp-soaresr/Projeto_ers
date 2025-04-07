<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';           // garante o nome correto
    protected $primaryKey = 'id';            // chave primária padrão
    protected $fillable = ['produto','estoque','valor','categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
