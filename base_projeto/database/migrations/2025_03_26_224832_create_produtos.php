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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('produto');
            $table->integer('estoque');
            $table->float('valor', 8, 2);
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_forma_pagamento');
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('restrict');
            $table->foreign('id_forma_pagamento')->references('id')->on('forma_pagamentos')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
