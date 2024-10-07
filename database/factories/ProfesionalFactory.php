<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profesional>
 */
class ProfesionalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name,
            'apellido' => fake()->lastName,
            'pais_origen' => fake()->country,
            'fecha_nacimiento' => fake()->date,
            'fecha_registro_plataforma' => fake()->date,
        ];
    }
}
