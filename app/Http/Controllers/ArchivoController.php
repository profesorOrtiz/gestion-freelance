<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubirArchivoRequest;

class ArchivoController extends Controller
{
    public function create() {
        return view('archivo.create');
    }

    public function store(SubirArchivoRequest $request) {
        dd("Hay archivo");
        // 1) Validar el archivo
        // 1.1) Validar que el usuario tenga permiso para subir archivos (más adelante)

        // 2) Mover el archivo al disco local

        // 3) Subir a la base de datos (más adelante)

        // 4) Redirigir a la página anterior con un mensaje
    }
}
