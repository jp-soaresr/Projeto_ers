<?php

namespace Database\Seeders;

use App\Models\ProdutosServico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ProdutosServico::create([
            'id_produto' => 4,
            'id_servico' => 1,
            'quantidade' => 1,
            'total' => 35.99
        ]);

        ProdutosServico::create([
            'id_produto' => 2,
            'id_servico' => 2,
            'quantidade' => 1,
            'total' => 6000.00
        ]);
    }
}
