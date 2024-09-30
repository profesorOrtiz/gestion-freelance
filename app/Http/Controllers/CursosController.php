<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\User;
use App\Notifications\CursoEditado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CursoCreado;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1) Buscar todos los registros del recurso

        // SELECT * FROM cursos;
        $cursos = Curso::all();

        // SELECT * FROM cursos WHERE nivel = 'Avanzado';
        // $cursos = Curso::where('nivel', 'Avanzado')->get();

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
        if(! auth()->user()->hasPermissionTo('crear_curso')) {
            abort(403);
        }
        // Mostrar el formulario para crear un curso
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1) Comprobar si el usuario tiene permisos para crear
        if(! auth()->user()->hasPermissionTo('crear_curso')) {
            abort(403);
        }
        // 2) Validar los datos del curso a crear -> Form Request
        $datos = $request->validate([
            'nombre' => 'required|max:255',
            'instructor' => 'required|max:255',
            'categoria' => 'required|max:255',
            'nivel' => 'required|max:255',
        ]);

        // 3) Guardar el curso en la BD
        // INSERT INTO cursos(nombre, instructor, categoria, nivel) VALUES ('PHP intermedio', 'Gaston Paredes', 'Desarrollo Web', 'Intermedio');
        $curso = Curso::create([
            'nombre' => $datos['nombre'],
            'instructor' => $datos['instructor'],
            'categoria' => $datos['categoria'],
            'nivel' => $datos['nivel'],
        ]);

        // 3.1) Enviar el correo de CursoCreado
        Mail::to(auth()->user()->email)
            ->send(new CursoCreado($curso));

        // 4) Redirigir al usuario a la pagina de index del curso
        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 1) Buscar los datos del recurso segun el Id
        // SELECT * FROM cursos WHERE id = $id;
        $curso = Curso::find($id);

        // 2) Comprobar que el Id se corresponda con un registro valido
        if($curso === null) {
            abort(404);
        }

        // 3) Devolver la vista con el dato encontrado
        return view('cursos.show', [
            'curso' => $curso,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(! auth()->user()->hasPermissionTo('editar_curso')) {
            abort(403);
        }
        // 1) Buscar los datos del recurso segun el Id
        // SELECT * FROM cursos WHERE id = $id;
        $curso = Curso::find($id);

        // 2) Comprobar que el Id se corresponda con un registro valido
        if($curso === null) {
            abort(404);
        }

        // 3) Mostrar el formulario de edición
        return view('cursos.edit', [
            'curso' => $curso,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1) Comprobar si el usuario tiene permisos para editar
        if(! auth()->user()->hasPermissionTo('editar_curso')) {
            abort(403);
        }
        // 2) Comprobar si existe el curso a editar
        // 3) Validar los datos del curso a editar
        $datos = $request->validate([
            'nombre' => 'required|max:255',
            'instructor' => 'required|max:255',
            'categoria' => 'required|max:255',
            'nivel' => 'required|max:255',
        ]);

        // 4) Editar el curso en la BD
        // UPDATE cursos SET nombre = 'nuevoNombre' WHERE id = $id;
        Curso::where('id', $id)
            ->update([
                'nombre' => $datos['nombre'],
                'instructor' => $datos['instructor'],
                'categoria' => $datos['categoria'],
                'nivel' => $datos['nivel'],
            ]);

        // 4.1) Enviar notificacion de curso editado
        // Opcion 1: enviar la notificacion al usuario logueado
        /* $curso = Curso::find($id);
        $usuario = auth()->user();
        $usuario->notify(new CursoEditado($curso)); */

        // Opcion 2: enviar la notificacion a todos los admins
        $curso = Curso::find($id);
        $admins = User::role('admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new CursoEditado($curso));
        }

        // 5) Redirigir al usuario a la pagina de show del curso
        return redirect()->route('cursos.show', ['curso' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1) Comprobar si el usuario tiene permisos para eliminar
        // auth()->user()
        // Auth::user()
        // request()->user()
        if(! auth()->user()->hasPermissionTo('eliminar_curso')) {
            abort(403);
        }

        // 2) Comprobar si existe el curso a eliminar
        // 3) Eliminar el curso en la BD
        // DELETE FROM cursos WHERE id = $id;
        Curso::where('id', $id)->delete();

        // 4) Redirigir al usuario a la pagina de index del curso
        return redirect()->route('cursos.index');
    }
}
