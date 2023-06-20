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
        Schema::create('motivo_movto', function (Blueprint $table){
            $table->id('grid');
            $table->string('nome');
            $table->bigInteger('codigo')->unique();
        });

                
        // Define o valor padrão e cria o evento para atualizar o campo 'documento'
        DB::statement('CREATE SEQUENCE motivo_movto_codigo_seq OWNED BY motivo_movto.codigo');
        DB::statement('ALTER TABLE  motivo_movto ALTER COLUMN codigo SET DEFAULT nextval(\'motivo_movto_codigo_seq\'::regclass)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('motivo_movto');
    }
};
