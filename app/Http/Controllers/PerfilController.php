<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clases\Proyecto;
use App\Clases\ProyectoWeb;

class PerfilController extends Controller
{
    public function mostrar() {
        $proyecto1 = new Proyecto('Taller de Laravel', 2024, 'En curso');
        $proyecto2 = new Proyecto('Curso de ChatGPT', 2024, 'Completado');
        $proyecto3 = new ProyectoWeb('Proyecto de Restaurante', 2023, 'Completado', 'Pablo Slame y Gastón Caceres', 'Programador Full-Stack');

        $proyectos = [
            $proyecto1->toArray(),
            $proyecto2->toArray(),
            $proyecto3->toArray(),
        ];

        $nombre = 'Juan Carlos Ortiz';
        return view('perfil', [
            'nombre' => $nombre,
            'proyectos' => $proyectos,
        ]);
    }
}
