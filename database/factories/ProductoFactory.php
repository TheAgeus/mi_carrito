<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'categoria_id' => fake()->numberBetween($min = 1, $max = 12),
            'precio_mx'=> fake()->randomFloat($nbMaxDecimals = 2, $min = 10.00, $max = 20000.00),
            'stock'=>fake()->numberBetween($min = 1, $max = 500),
            'usuario_id'=>fake()->numberBetween($min = 2, $max = 3),
            'codigo_proveedor' => Str::random(5),
            'proveedor' => fake()->company(),
            'precio_proveedor' => fake()->randomFloat($nbMaxDecimals = 2, $min = 10.00, $max = 20000.00)
        ];
    }
}
