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
        Schema::create('orcamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_forma_pagamento');
            $table->date('data_inicio');
            $table->date('data_final');
            $table->string('placa_veiculo');
            $table->string('modelo_veiculo');
            $table->string('marca');
            $table->float('valor_total', 8, 2);
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('restrict');
            $table->foreign('id_forma_pagamento')->references('id')->on('forma_pagamento')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orcamento');
    }
};
