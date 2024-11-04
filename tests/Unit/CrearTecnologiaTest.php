<?php

// Validar que al crear una tecnologia, el nombre es requerido

use App\Models\Tecnologia;

test('requiere ingresar un nombre valido al crear una tecnologia', function() {
    $this->post('tecnologias', [
        'nombre' => '',
    ])->assertInvalid(['nombre' => 'required']);
});

// Validar la creacion de una nueva tecnología
test('se puede crear una tecnología', function() {
    // Opcion 1) Crear datos directamente en la BD
    /* $this->post('tecnologias', [
        'nombre' => 'Javascript',
    ])->assertStatus(302);

    $this->assertDatabaseHas(Tecnologia::class, [
        'nombre' => 'Javascript',
    ]); */

    // Opcion 2) usar mocks
    $mock = Mockery::mock(Tecnologia::class);
    $mock->shouldReceive('create')
        ->once()
        ->with(['nombre' => 'PHP']);

    app()->instance(Tecnologia::class, $mock);

    $this->post('tecnologias', [
        'nombre' => 'PHP',
    ])->assertStatus(302);
});

afterEach(function() {
    Mockery::close();
});
