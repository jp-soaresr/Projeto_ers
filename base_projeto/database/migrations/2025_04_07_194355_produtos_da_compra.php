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
        Schema::create('produtos_da_compra', function (Blueprint $table) {
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_produto');
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('restrict');
            $table->foreign('id_produto')->references('id')->on('produtos')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
