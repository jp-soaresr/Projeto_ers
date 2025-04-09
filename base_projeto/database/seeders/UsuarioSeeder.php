<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'nome' => 'Administrador',
            'email' => 'adm@adm.com',
            'senha' => bcrypt('adm'),
            'telefone' => '99999999',
            'nivel' => 'admin',
        ]);
    }
}
