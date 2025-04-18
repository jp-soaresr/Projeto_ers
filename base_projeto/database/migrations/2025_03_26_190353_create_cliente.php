<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); //PRIMARY KEY AUTO_INCREMENT
            $table->string('nome', 100); //VARCHAR(100)
            $table->string('email')->unique();
            $table->string('telefone')->nullable();
            $table->string('endereco');
            $table->string('cpf_cnpj');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
