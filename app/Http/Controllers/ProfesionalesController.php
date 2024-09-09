<?php

namespace App\Http\Controllers;

use App\Models\Profesional;
use Illuminate\Http\Request;

class ProfesionalesController extends Controller
{
    public function index() {
        $profesionales = Profesional::all();

        return view('profesionales.index', [
            'profesionales' => $profesionales,
        ]);
    }
}
