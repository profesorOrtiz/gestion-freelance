<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contactanos', function () {
    $nombre = 'Juan Carlos Ortiz';
    return view('contacto', [
        'nombre' => $nombre,
        'email' => 'juan@email.com',
    ]);
})->name('contacto');

Route::get('/productos/{id}', function ($id) {
    return "Esta es la página del producto $id";
});

// Tarea: crear una ruta llamada perfil que redirija a una página de perfil de ustedes y en esa página van a imprimir su nombre completo.








Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
