<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1) Buscar todos los registros del recurso
        $cursos = $this->datos();
        // 2) Devolver la vista del listado con los registros
        return view('cursos.index', [
            'cursos' => $cursos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario para crear un curso
        dd("Formulario para crear un curso");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd("Guardar el nuevo curso");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 1) Buscar los datos del recurso segun el Id
        $cursos = $this->datos();
        $cursoAMostrar = null;
        foreach ($cursos as $curso) {
            if($curso['id'] == (int)$id) {
                $cursoAMostrar = $curso;
            }
        }
        // 2) Comprobar que el Id se corresponda con un registro valido
        if($cursoAMostrar === null) {
            abort(404);
        }

        // 3) Devolver la vista con el dato encontrado
        return view('cursos.show', [
            'curso' => $cursoAMostrar,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 1) Buscar los datos del recurso segun el Id
        $cursos = $this->datos();
        $cursoAMostrar = null;
        foreach ($cursos as $curso) {
            if($curso['id'] == (int)$id) {
                $cursoAMostrar = $curso;
            }
        }
        // 2) Comprobar que el Id se corresponda con un registro valido
        if($cursoAMostrar === null) {
            abort(404);
        }
        // 3) Mostrar el formulario de edición
        return view('cursos.edit', [
            'curso' => $cursoAMostrar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd("Petición para actualizar el curso");
        // 1) Comprobar si el usuario tiene permisos para editar
        // 2) Comprobar si existe el curso a editar
        // 3) Validar los datos del curso a editar
        // 4) Editar el curso en la BD
        // 5) Redirigir al usuario a la pagina de show del curso
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Emula los datos guardados en una BD
    private function datos() {
        return [
            [
                'id' => 1,
                'nombre' => 'Inteligencia Artificial desde cero',
                'instructor' => 'Microsoft',
                'nivel' => 'principiante',
                'categoria' => 'Inteligencia Artificial',
            ],
            [
                'id' => 2,
                'nombre' => 'Python desde cero',
                'instructor' => 'Amazon',
                'nivel' => 'principiante',
                'categoria' => 'Lenguajes de Programación',
            ],
            [
                'id' => 3,
                'nombre' => 'Matemática aplicada a la Ciencia de Datos',
                'instructor' => 'Microsoft',
                'nivel' => 'avanzado',
                'categoria' => 'Ciencia de Datos',
            ],
            [
                'id' => 4,
                'nombre' => 'PHP Avanzado',
                'instructor' => 'PHP Foundation',
                'nivel' => 'intermedio',
                'categoria' => 'Backend',
            ],
        ];
    }
}
