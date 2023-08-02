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
        Schema::create('contas', function (Blueprint $table){
            $table->id('grid');
            $table->string('nome');
            $table->string('codigo')->unique();
            $table->enum('tipo_conta', ['D', 'C']);
            $table->integer('saldo_inicial');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('contas');
    }
};
