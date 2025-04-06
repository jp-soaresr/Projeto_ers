<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicoOrcamento extends Model
{
    use HasFactory;

    protected $fillable = ['id_orcamento', 'id_servico','valor_total'];

    public function servico() 
    {
        return $this->belongsTo(Servico::class);
    }

    public function orcamento() 
    {
        return $this->belongsTo(Orcamento::class);
    }
}
