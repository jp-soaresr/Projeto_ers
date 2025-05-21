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
        // Administrador
        Usuario::create([
            'nome' => 'Administrador',
            'email' => 'adm@adm.com',
            'senha' => bcrypt('adm'),
            'telefone' => '99999999',
            'nivel' => 'admin',
        ]);

        // Primeiro novo usuário
        Usuario::create([
            'nome' => 'Jp',
            'email' => 'soaresr0105@gmail.com',
            'senha' => bcrypt('12345'),
            'telefone' => '18 997394127',
            'nivel' => 'gestor',
        ]);

        // Segundo novo usuário
        Usuario::create([
            'nome' => 'Livia Landim',
            'email' => 'livialandim04@gmail.com',
            'senha' => bcrypt('panela'),
            'telefone' => '18 997208929',
            'nivel' => 'gestor',
        ]);
    }
}
