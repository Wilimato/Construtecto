<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    protected static function enviar()
    {
        $mensaje = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            //crear una instancia de PHPMailer
            $email = new PHPMailer();

            //Configurar SMTP
            $email->isSMTP();
            $email->Host = $_ENV['MAIL_HOST'];
            $email->SMTPAuth = true;
            $email->Port = $_ENV['MAIL_PORT'];
            $email->Username = $_ENV['MAIL_USER'];;
            $email->Password = $_ENV['MAIL_PASS'];;
            $email->SMTPSecure = 'tls';

            //configurar el contenido del email

            $email->setFrom('wilimato09@gmail.com');
            $email->addAddress('wilimato09@gmail.com', 'BienesRaices.com');
            $email->Subject = 'Tienes un Nuevo Mensaje';

            //habilitar HTML

            $email->isHTML(true);
            $email->CharSet = 'UTF-8';

            //Definir el contenido

            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';

            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Prefirió ser contactado por teléfono: </p>';
                $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha Contacto: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . '</p>';
            } else {

                $contenido .= '<p>Prefirió ser contactado por email: </p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            }


            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Servicio: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '</html>';

            $email->Body = $contenido;
            $email->AltBody = 'Esto es texto alternativo sin html';

            //Enviar el email

            if ($email->send()) {

                $mensaje = "Mensaje Enviado Correctamente";
            } else {
                echo $email->ErrorInfo;
                $mensaje = 'El mensaje no se pudo enviar..';
            }
        }
        return $mensaje;
    }
    public static function index(Router $router)
    {
        $mensaje = self::enviar();

        $propiedades = Propiedad::get(9);

        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio,
            'mensaje' => $mensaje
        ]);
    }
    public static function nosotros(Router $router)
    {


        $router->render('paginas/nosotros', []);
    }
    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router)
    {

        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router)
    {
        $router->render('paginas/blog');
    }
    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada');
    }
    public static function contacto(Router $router)
    {
        $mensaje = self::enviar();
        $router->render('paginas/contacto', [

            'mensaje' => $mensaje

        ]);
    }
}
