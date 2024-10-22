<?php

namespace App\Http\Controllers;

use App\Models\Tecnologia;
use Illuminate\Http\Request;

class TecnologiasController extends Controller
{
    public function index() {
        $tecnologias = Tecnologia::all();

        return view('tecnologias.index', [
            'tecnologias' => $tecnologias,
        ]);
    }

    public function show(int $id) {
        $tecnologia = Tecnologia::findOrFail($id);

        return view('tecnologias.show', [
            'tecnologia' => $tecnologia,
        ]);
    }

    public function store(Request $request) {
        $datos = $request->validate([
            'nombre' => 'required|max:255',
        ]);

        Tecnologia::create([
            'nombre' => $datos['nombre'],
        ]);

        return redirect()->route('tecnologias.index');
    }
}
