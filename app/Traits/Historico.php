<?php

namespace App\Traits;

trait Historico {
    private string $creado_en;

    public function creado_en(): string {
        $fecha = new \DateTime();
        return $fecha->format('d/m/Y H:i:s');
    }
}

interface Historico {
    public function creado_en(): string;
}
