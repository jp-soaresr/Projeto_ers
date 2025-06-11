<?php

namespace Database\Seeders;

use App\Models\FormaPagamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormaPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormaPagamento::create([
            'forma_pagamento' => 'Cartão de Crédito'
        ]);

        FormaPagamento::create([
            'forma_pagamento' => 'Cartão de Débito'
        ]);

        FormaPagamento::create([
            'forma_pagamento' => 'Dinheiro'
        ]);

        FormaPagamento::create([
            'forma_pagamento' => 'Pix'
        ]);
    }
}
