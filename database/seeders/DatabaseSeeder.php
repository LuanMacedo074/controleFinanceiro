<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MovimentacaoFinanceiraSeeder;
use Database\Seeders\MotivoMovtoSeeder;
use Database\Seeders\ContasSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MovimentacaoFinanceiraSeeder::class,
            MotivoMovtoSeeder::class,
            ContasSeeder::class,
        ]);
    }
}
