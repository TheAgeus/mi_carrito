<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comentario' => fake()->text($maxNbChars = 200),
            'calificacion' => fake()->numberBetween($min = 1, $max = 5),
            'usuario_id' => fake()->numberBetween($min = 1, $max = 23),
            'producto_id' => fake()->numberBetween($min = 1, $max = 20)
        ];
    }
}
