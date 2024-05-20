<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactoGuardarRequest;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function mostrar() {
        $nombre = 'Juan Carlos Ortiz';
        return view('contacto', [
            'nombre' => $nombre,
            'email' => 'juan@email.com',
        ]);
    }

    public function guardar(ContactoGuardarRequest $request) {
        // 1) Validar -> automaticamente el ContactoGuardarRequest

        // 2) Procesar: guardar en la BD -> Proximamente

        // 3) Informar el resultado del proceso
        // Redirigiendo a la página previa con una variable de estado cuyo valor es ok
        return back()->with('estado', 'ok');
    }
}
