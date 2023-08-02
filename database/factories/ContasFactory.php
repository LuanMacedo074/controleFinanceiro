<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contas>
 */
class ContasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arrayValues = ['D', 'C'];

        return [
            'nome' => fake()->name(),
            'codigo' => fake()->unique()->randomDigit(),
            'tipo_conta' => $arrayValues[rand(0,1)],
            'saldo_inicial' => fake()->randomFloat(2, 0, 2500)*100,
        ];
    }
}
