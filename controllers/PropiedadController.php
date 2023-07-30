<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();

        $vendedores = Vendedores::all();
        //muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;
        $router->render('propiedades/admin', [

            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores

        ]);
    }
    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedores::all();

        //Arreglo con mensajes de errores

        $errores = Propiedad::getErrores();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            //Crea una nueva instancia
            $propiedad = new Propiedad($_POST["propiedad"]);

            //Generar nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


            //Setear la imagen

            if ($_FILES["propiedad"]["tmp_name"]["imagen"]) {

                //Realizar resize a la imagen con Intervention
                $image = Image::make($_FILES["propiedad"]["tmp_name"]["imagen"])->fit(800, 600);

                //Agrega nombre a atributo imagen
                $propiedad->setImagen($nombreImagen);
            }

            //Validar 

            $errores = $propiedad->validar();



            //Revisar que el array de errores este vació

            if (empty($errores)) {



                //Crear carpeta de imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }


                //Guarda la imagen el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //Guardar en la Base de Datos
                $propiedad->guardar();
            }
        }



        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');

        $propiedad = Propiedad::find($id);

        $errores = Propiedad::getErrores();

        $vendedores = Vendedores::all();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $args = [];

            $args = $_POST["propiedad"];

            $propiedad->sincronizar($args);

            //Validación 
            $errores = $propiedad->validar();

            //Generar nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Subida de archivos
            if ($_FILES["propiedad"]["tmp_name"]["imagen"]) {

                //Realizar resize a la imagen con Intervention
                $image = Image::make($_FILES["propiedad"]["tmp_name"]["imagen"])->fit(800, 600);

                //Agrega nombre a atributo imagen
                $propiedad->setImagen($nombreImagen);
            }

            //Revisar que el array de errores este vació

            if (empty($errores)) {

                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                $propiedad->guardar();
            }
        }


        $router->render("propiedades/actualizar", [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
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
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}
