<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear dos roles
        $admin = Role::create(['name' => 'admin']);
        $escritor = Role::create(['name' => 'escritor']);

        // Crear permisos para cursos
        $crear_curso = Permission::create(['name' => 'crear_curso']);
        $editar_curso = Permission::create(['name' => 'editar_curso']);
        $eliminar_curso = Permission::create(['name' => 'eliminar_curso']);

        // Asignar permisos a un rol
        $admin->givePermissionTo([
            $crear_curso,
            $editar_curso,
            $eliminar_curso,
        ]);

        $escritor->givePermissionTo([
            $crear_curso,
            $editar_curso,
        ]);

        // Crear usuarios y asignarle roles
        $user_admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $user_admin->assignRole($admin);

        $user_admin2 = User::factory()->create([
            'name' => 'admin2',
            'email' => 'admin2@example.com',
            'password' => Hash::make('password'),
        ]);
        $user_admin2->assignRole($admin);

        $user_escritor = User::factory()->create([
            'name' => 'escritor',
            'email' => 'escritor@example.com',
            'password' => Hash::make('password'),
        ]);
        $user_escritor->assignRole($escritor);
    }
}
