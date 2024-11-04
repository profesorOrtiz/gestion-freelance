<?php

test('requiere ingresar un nombre valido', function() {
    $this->post('cursos', [
        'nombre' => '',
        'instructor' => '',
        'categoria' => '',
        'nivel' => '',
    ])->assertInvalid([
        'nombre' => 'required',
        'instructor' => 'required',
        'categoria' => 'required',
        'nivel' => 'required',
    ]);
});
