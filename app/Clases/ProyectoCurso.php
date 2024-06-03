<?php

namespace App\Clases;

use App\Clases\Proyecto;

class ProyectoCurso extends Proyecto {
    private string $organizacion;

    // 1) Constructor
    public function __construct(string $n, int $a, string $e, string $o) {
        // Delegamos la tarea de asignar los primeros 3 argumentos a la clase padre (Proyecto)
        parent::__construct($n, $a, $e);
        $this->organizacion = $o;
    }

    public function getOrganizacion(): string {
        return $this->organizacion;
    }

    // Sobrescritura de un método heredado
    public function toArray(): array {
        return [
            'tipo' => 'curso',
            'creacion' => $this->creacion(),
            'nombre' => $this->getNombre(),
            'anio' => $this->getAnio(),
            'estado' => $this->getEstado(),
            'organizacion' => $this->getOrganizacion(),
        ];
    }
}
