<?php

namespace Database\Seeders;

use App\Models\Veiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Veiculo::create([
            'marca' => 'Fiat',
            'modelo' => 'Argo',
            'placa' => 'BRA2A34',
            'id_cliente' => '1',
        ]);

        Veiculo::create([
            'marca' => 'Volkswagen',
            'modelo' => 'Fusca',
            'placa' => 'QWE8C19',
            'id_cliente' => '1',
        ]);

        Veiculo::create([
            'marca' => 'Renault',
            'modelo' => 'Kwid',
            'placa' => 'ABC1D23',
            'id_cliente' => '2',
        ]);

        
    }
}
