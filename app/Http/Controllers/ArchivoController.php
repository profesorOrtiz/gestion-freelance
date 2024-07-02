<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubirArchivoRequest;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function create() {
        return view('archivo.create');
    }

    public function store(SubirArchivoRequest $request) {
        // 1) Validar el archivo
        // 1.1) Validar que el usuario tenga permiso para subir archivos (más adelante)

        // 2) Mover el archivo al disco local
        $archivo = $request->file('archivo');
        $nombre = $archivo->hashName();

        Storage::disk('local')->put("public/logos/{$nombre}", file_get_contents($archivo));

        // 3) Subir a la base de datos (más adelante)

        // 4) Redirigir a la página anterior con un mensaje
        return redirect()->back()->with([
            'exito' => 'El archivo se ha guardado'
        ]);
    }

    public function show() {
        return view('archivo.show', [
            'url' => Storage::url('logos\wOqU6GpQAesKjTX9NxJKkligXhGcYyXhzFmMSrWC.png')
        ]);
    }
}
