<?php

// 1) Testear el acceso a las rutas públicas

use App\Models\User;

test('comprobar que las rutas publicas funcionan', function($url) {
    $this->get($url)->assertOk();
})->with(['/', '/contactanos', '/tecnologias', '/profesionales']);

// 2) Testear que las rutas privadas esten protegidas
test('comprobar que las rutas privadas estan protegidas', function() {
    $this->get('/cursos')->assertStatus(302);
});


test('comprobar que se puede acceder al dashboard con un usuario registrado', function() {
    $admin = User::where('name', 'admin')->first();

    $this->actingAs($admin)
        ->get('/dashboard')
        ->assertOk();

    /* $this->actingAs(User::factory()->create())
        ->get('/dashboard')
        ->assertOk(); */
});
