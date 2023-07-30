<?php

namespace Model;

class ActiveRecord
{
    //Base de datos
    protected static $db;
    //Para mapear columnas 
    protected static $columnasDB = [];
    protected static $tabla = "";

    //Errores o validaciones +

    protected static $errores = [];


    //Definir la conexión a la base de datos

    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function guardar()
    {
        if (!is_null($this->id)) {
            //Actualizar
            $this->actualizar();
        } else {
            //Crear nuevo registro
            $this->crear();
        }
    }

    public function crear()
    {
        //Sanitization
        $atributos = $this->sanitizarAtributos();

        $string = join(", ", array_keys($atributos));

        $value = join("', '", array_values($atributos));


        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= $string;
        $query .= ") VALUES (' ";
        $query .= $value;
        $query .= " ') ";


        $resultado = self::$db->query($query);

        if ($resultado) {
            // Redireccionar al usuario

            header("location: /admin?resultado=1");
        }
    }

    public function actualizar()
    {
        //Sanitization
        $atributos = $this->sanitizarAtributos();

        $valores = [];

        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $valor = join(", ", $valores);

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= $valor;
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado) {
            // Redireccionar al usuario

            header("location: /admin?resultado=2");
        }
    }

    //Eliminar Registro

    public function eliminar()
    {
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();
            header("location: /admin?resultado=3");
        }
    }

    //Subida de Archivos
    public function setImagen($imagen)
    {
        //eliminar imagen
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        //Asignar al atributo imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    //Eliminar Archivo de carpeta imagen

    public function borrarImagen()
    {
        //comprueba si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);

        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    //Identificar y unir los atributos de la base de datos
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === "id") continue;
            $atributos[$columna] = preg_replace('/[\(\<\>\)\" "]/', ' ', $this->$columna);
        }
        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        //Array atributos sanitizados
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
        static::$errores;
        return static::$errores;
    }

    //Lista todas los registros

    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;


        $resultado = self::consultarSQL($query);

        return $resultado;
    }
    //limitar vista de productos
    public static function get($limite)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $limite;


        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //Busca un registro por su ID
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id};";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {
        //consultar en la Base de Datos
        $resultado = self::$db->query($query);

        //Iterar los resultados
        $array = [];

        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        //Liberar la memoria

        $resultado->free();

        //Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
