<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PerfilController;
use Illuminate\Support\Facades\Route;
use App\Clases\Url;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\ProfesionalesController;
use App\Http\Controllers\TecnologiasController;
use App\Models\Usuario;
use App\Models\Perfil;
use App\Models\Direccion;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/url', function() {
    return Url::path();
});

Route::get('/contactanos', [ContactoController::class, 'mostrar'])
    ->name('contacto');

Route::post('/contactanos', [ContactoController::class, 'guardar'])
    ->name('contacto.guardar');

Route::get('/productos/{id}', [ProductosController::class, 'mostrar'])
    ->name('productos.mostrar');

Route::get('/perfil', [PerfilController::class, 'mostrar'])
    ->name('perfil');

// Route::resource define automáticamente las 7 rutas de recurso y las enlaza con los métodos del controlador
Route::resource('cursos', CursosController::class)->middleware('auth');

Route::get('/ver-archivo', [ArchivoController::class, 'show'])
    ->name('archivo.show');

Route::get('/archivo/create', [ArchivoController::class, 'create'])
    ->name('archivo.create');

Route::post('/archivo', [ArchivoController::class, 'store'])
    ->name('archivo.store');

// Rutas que empiezan con /admin
Route::prefix('admin')->group(function() {
    // Ruta efectiva: /admin/index
    Route::get('/index', function() {
        dd('Ruta index del admin');
    });

    // Ruta efectiva: /admin/usuarios
    Route::get('/usuarios', function() {
        dd('Ruta usuarios del admin');
    });
});

Route::get('/usuarios', function() {
    dd('Ruta usuarios comun');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Rutas de prueba de relaciones entre tablas
Route::get('/relaciones', function () {
    // $perfil_usuario = Perfil::find(1)->usuario->email;

    // $direccion_usuario = Direccion::find(1)->usuario->nombre;

    $direcciones_usuario = Usuario::find(1)->direcciones;

    foreach ($direcciones_usuario as $direccion) {
        echo $direccion->calle . " " . $direccion->numero . "<br>";
    }

    // dd($direccion_usuario);
});

Route::get('/profesionales', [ProfesionalesController::class, 'index'])
    ->name('profesionales.index');

Route::get('/tecnologias', [TecnologiasController::class, 'index'])
    ->name('tecnologias.index');

Route::get('/tecnologias/{id}', [TecnologiasController::class, 'show'])
    ->name('tecnologias.show');
