<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PerfilController;
use Illuminate\Support\Facades\Route;
use App\Clases\Url;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\ArchivoController;

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
Route::resource('cursos', CursosController::class);

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
