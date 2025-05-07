<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = ['marca', ' modelo', 'placa', 'id_cliente'];

    public function cliente() 
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
