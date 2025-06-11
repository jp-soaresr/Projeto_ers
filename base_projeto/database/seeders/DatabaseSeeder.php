<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UsuarioSeeder::class);

        $this->call(FormaPagamentoSeeder::class);

        $this->call(CategoriaSeeder::class);

        $this->call(ClienteSeeder::class);
        
        $this->call(VeiculoSeeder::class);        
        
        $this->call(ProdutoSeeder::class);

        $this->call(ServicoSeeder::class);

        $this->call(ProdutoServicoSeeder::class);
    }
}
