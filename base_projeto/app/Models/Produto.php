<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos'; // <- garante que usa o nome correto da tabela

    protected $fillable = ['produto', 'estoque', 'valor'];
}
