<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MovimentacaoFinanceira;  

class MovimentacaoFinanceiraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MovimentacaoFinanceira::factory()->count(50)->create();
    }
}
