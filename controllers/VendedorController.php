<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedores;

class VendedorController
{
    public static function crear(Router $router)
    {

        $vendedor = new Vendedores;
        $errores = Vendedores::getErrores();

        //Arreglo con mensajes de errores


        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $vendedor = new Vendedores($_POST["vendedor"]);
            $errores = $vendedor->validar();

            if (empty($errores)) {
                $vendedor->guardar();
            }
        }


        $router->render('vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');

        $vendedor = Vendedores::find($id);

        $errores = Vendedores::getErrores();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            //Asignar los valores en una variable
            $args = $_POST["vendedor"];

            //Sincronizar objeto en memoria con lo que el usuario escribió
            $vendedor->sincronizar($args);

            $errores = $vendedor->validar();

            if (empty($errores)) {
                $vendedor->guardar();
            }
        }


        $router->render("vendedores/actualizar", [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $id = $_POST["id"];

            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $tipo = $_POST["tipo"];

                if (validarTipoContenido($tipo)) {
                    $vendedores = Vendedores::find($id);
                    $vendedores->eliminar();
                }
            }
        }
    }
}
