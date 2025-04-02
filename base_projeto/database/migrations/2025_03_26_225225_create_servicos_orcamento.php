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
        Schema::create('servicos_orcamento', function (Blueprint $table) {
            $table->unsignedBigInteger('id_orcamento');
            $table->unsignedBigInteger('id_servico');
            $table->foreign('id_orcamento')->references('id')->on('orcamento')->onDelete('restrict');
            $table->foreign('id_servico')->references('id')->on('servico')->onDelete('restrict');
            $table->float('valor_total', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos_orcamento');
    }
};
