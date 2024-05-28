<?php

namespace App\Clases;

class Url {
    public static function path(): string {
        return $_SERVER['REQUEST_URI'];
    }
}
