<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Categoria::create([
            'categoria' => 'Pneu'
        ]);

        Categoria::create([
            'categoria' => 'Motor'
        ]);

        Categoria::create([
            'categoria' => 'Óleo de motor'
        ]);

        Categoria::create([
            'categoria' => 'Bateria'
        ]);
    }
}
