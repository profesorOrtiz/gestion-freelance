<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function mostrar() {
        $proyectos = [
            [
                'nombre' => 'Taller de Laravel',
                'anio' => 2024,
                'estado' => 'En curso',
            ],
            [
                'nombre' => 'Curso de ChatGPT',
                'anio' => 2024,
                'estado' => 'Completado',
            ],
        ];
        $nombre = 'Juan Carlos Ortiz';
        return view('perfil', [
            'nombre' => $nombre,
            'proyectos' => $proyectos,
        ]);
    }
}
