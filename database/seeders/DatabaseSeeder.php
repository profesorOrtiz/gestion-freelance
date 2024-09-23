<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Invocamos el CursoFactory para crear 10 ejemplos de cursos y guardarlos en la tabla
        // Curso::factory(10)->create();
        $this->call(PermissionSeeder::class);
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
    }
}
