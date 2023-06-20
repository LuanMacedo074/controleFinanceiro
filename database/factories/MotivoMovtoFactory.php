<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MotivoMovto>
 */
class MotivoMovtoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'codigo' => DB::select("select nextval('motivo_movto_codigo_seq'::regclass) as nv;")[0]->nv
        ];
    }
}
