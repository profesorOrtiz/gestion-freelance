<?php

namespace App\Clases;

use App\Clases\Proyecto;

class ProyectoWeb extends Proyecto {
    private string $supervisor;
    private string $rol;

    // 1) Constructor
    public function __construct(string $n, int $a, string $e, string $s, string $r) {
        // Delegamos la tarea de asignar los primeros 3 argumentos a la clase padre (Proyecto)
        parent::__construct($n, $a, $e);
        $this->supervisor = $s;
        $this->rol = $r;
    }

    public function getSupervisor(): string {
        return $this->supervisor;
    }

    public function getRol(): string {
        return $this->rol;
    }

    // Sobrescritura de un método heredado
    public function toArray(): array {
        return [
            'tipo' => 'web',
            'creacion' => $this->creacion(),
            'nombre' => $this->getNombre(),
            'anio' => $this->getAnio(),
            'estado' => $this->getEstado(),
            'rol' => $this->getRol(),
            'supervisor' => $this->getSupervisor(),
        ];
    }
}
