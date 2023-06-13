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
            $table->id('grid');
            $table->dateTime('data');
            $table->bigInteger('motivo');
            $table->string('conta_debitar');
            $table->string('conta_creditar');
            $table->char('obs', 255);
            $table->double('valor');
            $table->bigInteger('parent');
            $table->bigInteger('child');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('movimentacao_financeira');
    }
};
