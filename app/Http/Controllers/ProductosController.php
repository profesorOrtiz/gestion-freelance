<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    // Crear un método que responda a la ruta de productos
    public function mostrar($id) {
        return "Esta es la página del producto $id";
    }
}
