<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requests', function(Blueprint $table){
            $table->id('grid');
            $table->char('endpoint', 255);
            $table->char('method', 255);
            $table->ipAddress('request_ip');
            $table->dateTime('hora')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('requests');
    }
};
