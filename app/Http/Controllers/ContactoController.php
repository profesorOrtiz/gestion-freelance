<?php

namespace App\Http\Controllers;

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
}
