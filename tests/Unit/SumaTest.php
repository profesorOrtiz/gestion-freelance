<?php

test('suma dos numeros', function() {
    // Primero realizamos la operación a testear
    $resultado = 1 + 2;

    // Luego testeamos el resultado mediante la API de expectativas
    // "Espero que la variable $resultado sea un entero, también que sea igual a 3, también que no sea una cadena y por último que no sea igual a 4"
    expect($resultado)
        ->toBeInt()
        ->toBe(3)
        ->not->toBeString()
        ->not->toBe(4);
});
