<?php

use function PHPSTORM_META\exitPoint;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION["login"] ?? false;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raíces</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? "inicio" : ""; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logo tipo bienes raices">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="boton dark mode" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="../../nosotros.php">Nosotros</a>
                        <a href="../../anuncios.php">Anuncios</a>
                        <a href="../../blog.php">Blog</a>
                        <a href="../../contacto.php">Contactos</a>


                        <?php if ($auth) : ?>
                            <a href="../../admin/index.php">Administrar Productos</a>
                            <a href="../../cerrar-seccion.php">Cerrar Sección</a>
                        <?php else : ?>
                            <a href="login.php">Iniciar Session</a>
                        <?php endif ?>
                    </nav>
                </div>
            </div>
            <!--Fin de barra--->
            <?php echo $inicio ? "<h1>Ventas de Casas y Departamentos Exclusivos de lujo</h1>" : ""; ?>
        </div>
    </header>