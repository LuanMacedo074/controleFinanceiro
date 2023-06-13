<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovimentacaoFinanceira>
 */
class MovimentacaoFinanceiraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'motivo' => 1,
            'conta_debitar' => '1.1',
            'conta_creditar' => '1.1.2',
            'valor' => fake()->randomFloat(2, 0, 500),
        ];
    }
}
