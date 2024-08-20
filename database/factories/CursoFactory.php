<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $niveles = ['basico', 'intermedio', 'avanzado'];
        $categorias = ['desarrollo web', 'aplicaciones', 'IA'];
        return [
            'nombre' => fake()->sentence,
            'instructor' => fake()->name,
            'nivel' => $niveles[array_rand($niveles)],
            'categoria' => $categorias[array_rand($categorias)],
        ];
    }
}
