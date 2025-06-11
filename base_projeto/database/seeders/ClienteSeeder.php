<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cliente::create([
            'nome' => 'José da Silva',
            'email' => 'josesilva@email.com',
            'telefone' => '(18) 99999-9999',
            'endereco' => 'Rua das Acácias, 123, Centro - São Paulo/SP',
            'cpf_cnpj' => '123.456.789.00'
        ]);

        Cliente::create([
            'nome' => 'Maria Oliveira',
            'email' => 'mariaoliveira@email.com',
            'telefone' => '(21) 98888-7777',
            'endereco' => 'Avenida Brasil, 456, Jardim Primavera - Rio de Janeiro/RJ',
            'cpf_cnpj' => '987.654.321-00'
        ]);

        Cliente::create([
            'nome' => 'Carlos Pereira',
            'email' => 'carlospereira@email.com',
            'telefone' => '(31) 97777-6666',
            'endereco' => 'Rua dos Pinheiros, 789, Vila Nova - Belo Horizonte/MG',
            'cpf_cnpj' => '321.654.987-00'
        ]);
    }
}
