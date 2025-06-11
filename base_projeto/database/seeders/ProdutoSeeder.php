<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Produto::Create([
            'produto' => 'Pneu de caminhão',
            'estoque' => 12,
            'valor' => 450.99,
            'id_categoria' => '1',
        ]);

        Produto::create([
            'produto' => 'Motor 1.0 16V completo',
            'estoque' => 5,
            'valor' => 4500.00,
            'id_categoria' => 2,
        ]);

        Produto::create([
            'produto' => 'Motor 2.0 turbo',
            'estoque' => 3,
            'valor' => 8500.00,
            'id_categoria' => 2,
        ]);

        Produto::create([
            'produto' => 'Óleo de motor 5W30 sintético 1L',
            'estoque' => 50,
            'valor' => 35.99,
            'id_categoria' => 3,
        ]);

        Produto::create([
            'produto' => 'Bateria 12V 60Ah',
            'estoque' => 20,
            'valor' => 450.00,
            'id_categoria' => 4,
        ]);

        Produto::create([
            'produto' => 'Bateria 12V 80Ah',
            'estoque' => 10,
            'valor' => 650.00,
            'id_categoria' => 4,
        ]);
    }
}
