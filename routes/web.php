<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\ProfesionalesController;
use App\Http\Controllers\TecnologiasController;
use App\Http\Controllers\NotificationController;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/contactanos', [ContactoController::class, 'create'])
    ->name('contacto');

Route::post('/contactanos', [ContactoController::class, 'store'])
    ->name('contacto.guardar');

// Route::resource define automáticamente las 7 rutas de recurso y las enlaza con los métodos del controlador
Route::resource('cursos', CursosController::class)->middleware('auth');

Route::get('/profesionales', [ProfesionalesController::class, 'index'])
    ->name('profesionales.index');

Route::get('/tecnologias', [TecnologiasController::class, 'index'])
    ->name('tecnologias.index');

Route::get('/tecnologias/{id}', [TecnologiasController::class, 'show'])
    ->name('tecnologias.show');

Route::post('/notifications/{notification}/read', [NotificationController::class, 'read'])
    ->name('notifications.read');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
