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
        Schema::create('movimentacao_financeira', function (Blueprint $table){
            $table->string('documento')->unique();
            $table->id('grid');
            $table->date('data')->default(DB::raw('now()'));
            $table->bigInteger('motivo');
            $table->string('conta_debitar');
            $table->string('conta_creditar');
            $table->char('obs', 255)->nullable();
            $table->double('valor');
            $table->bigInteger('parent')->nullable();
            $table->bigInteger('child')->nullable();
        });
        
        // Define o valor padrão e cria o evento para atualizar o campo 'documento'
        DB::statement('CREATE SEQUENCE movimentacao_financeira_documento_seq OWNED BY movimentacao_financeira.documento');
        DB::statement('ALTER TABLE movimentacao_financeira ALTER COLUMN documento SET DEFAULT nextval(\'movimentacao_financeira_documento_seq\'::regclass)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('movimentacao_financeira');
    }
};
