<?php

namespace Model;

class Vendedores extends ActiveRecord
{
    protected static $columnasDB = ["id", "nombre", "apellido", "telefono"];
    protected static $tabla = "vendedores";

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;


    public function __construct($arg = [])
    {
        $this->id = $arg["id"] ?? null;
        $this->nombre = $arg["nombre"] ?? "";
        $this->apellido = $arg["apellido"] ?? "";
        $this->telefono = $arg["telefono"] ?? "";
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$errores[] = "El nombre es obligatorio";
        }

        if (!$this->apellido) {
            self::$errores[] = "El Apellido es obligatorio";
        }
        if (!$this->telefono) {
            self::$errores[] = "El teléfono es obligatorio";
        }

        if (!preg_match("/[0-9]{10}/", $this->telefono)) {
            self::$errores[] = "Solo números en el campo de teléfono";
        }

        return self::$errores;
    }
}
