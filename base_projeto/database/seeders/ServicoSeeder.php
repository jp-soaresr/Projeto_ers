<?php

namespace Database\Seeders;

use App\Models\Servico;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Servico::create([
        'nome' => 'Troca de óleo de motor',
        'valor' => '120.50',
        'data_inicio' => Carbon::parse('2025-06-01'),
        'data_fim' => Carbon::parse('2025-06-08'),
        'id_cliente' => 2,
        'id_forma_pagamento' => 1
        ]);

        Servico::create([
            'nome' => 'Troca de motor',
            'valor' => 120.00,
            'data_inicio' => Carbon::parse('2025-06-03'),
            'data_fim' => Carbon::parse('2025-06-03'),
            'id_cliente' => 2,
            'id_forma_pagamento' => 2
        ]);

        Servico::create([
            'nome' => 'Revisão geral',
            'valor' => 500.00,
            'data_inicio' => Carbon::parse('2025-06-05'),
            'data_fim' => Carbon::parse('2025-06-07'),
            'id_cliente' => 3,
            'id_forma_pagamento' => 1
        ]);
    }
}
