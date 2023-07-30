<?php

namespace Model;


class Propiedad extends ActiveRecord
{
    protected static $columnasDB = ["id", "titulo", "precio", "imagen", "descripcion", "habitacion", "wc", "estacionamiento", "creado", "vendedores_id"];
    protected static $tabla = "propiedad";

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitacion;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($arg = [])
    {
        $this->id = $arg["id"] ?? null;
        $this->titulo = $arg["titulo"] ?? "";
        $this->precio = $arg["precio"] ?? "";
        $this->imagen = $arg["imagen"] ?? "";
        $this->descripcion = $arg["descripcion"] ?? "";
        $this->habitacion = $arg["habitacion"] ?? "";
        $this->wc = $arg["wc"] ?? "";
        $this->estacionamiento = $arg["estacionamiento"] ?? "";
        $this->creado = date("Y/m/d");
        $this->vendedores_id = $arg["vendedores_id"] ?? "";
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }

        if (!$this->precio) {
            self::$errores[] = "el precio es obligatorio";
        }
        if (strlen($this->descripcion) < 50) /* strlen pasa la cantidad de caracteres */ {
            self::$errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }
        if (!$this->habitacion) {
            self::$errores[] = "El Número de habitacion es obligatorio";
        }
        if (!$this->wc) {
            self::$errores[] = "El Número de baños es obligatorio";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "El Número de lugares de estacionamiento es obligatorio";
        }
        if (!$this->vendedores_id) {
            self::$errores[] = "Elige un vendedor";
        }
        if (!$this->imagen) {
            self::$errores[] = "La imagen es super obligatoria";
        }

        return self::$errores;
    }
}
