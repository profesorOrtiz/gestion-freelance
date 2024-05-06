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

Route::get('/perfil', function() {
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
    // return view('perfil', compact('nombre', 'proyectos'));
})->name('perfil');







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
