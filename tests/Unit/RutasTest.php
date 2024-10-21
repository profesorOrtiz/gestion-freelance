<?php

// 1) Testear el acceso a las rutas públicas
test('comprobar que las rutas publicas funcionan', function($url) {
    $this->get($url)->assertOk();
})->with(['/', '/contactanos', '/tecnologias', '/profesionales']);

// 2) Testear que las rutas privadas esten protegidas
test('comprobar que las rutas privadas estan protegidas', function() {
    $this->get('/cursos')->assertStatus(302);
});
