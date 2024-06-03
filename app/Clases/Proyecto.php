<?php

namespace App\Clases;

use App\Interfaces\Arreglo;

// Clase abstracta -> no podemos crear objetos de esta clase
abstract class Proyecto implements Arreglo {
    private string $nombre;
    private int $anio;
    private string $estado;

    // 1) Constructor
    public function __construct(string $n, int $a, string $e) {
        $this->nombre = $n;
        $this->anio = $a;
        $this->estado = $e;
    }

    // 2) Getters
    public function getNombre(): string {
        return $this->nombre;
    }

    public function getAnio(): int {
        return $this->anio;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    // 3) Métodos de interfaces
    // Método abstracto, las clases hijas de esta clase se verán obligadas a redefinir el cuerpo del método
    public abstract function toArray(): array;
}
