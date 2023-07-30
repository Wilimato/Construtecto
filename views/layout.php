<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION["login"] ?? false;


if (!isset($inicio)) {
    $inicio = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construtecto</title>
    <!----Swiper CSS---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../build/css/app.css">
    <link rel="icon" href="../build/img/logo-mini.png" type="image/x-icon">


</head>

<body>
    <header class="header <?php echo $inicio ? "inicio" : ""; ?>">
        <div class="background-inicio">
            <div class="contenedor contenido-header">
                <div class="barra">
                    <a href="/">
                        <img src="/build/img/logo.png" alt="icono menu responsive">
                    </a>

                    <div class="mobile-menu">
                        <span class="material-symbols-outlined">
                            menu
                        </span>
                    </div>

                    <div class="derecha">
                        <nav class="navegacion">
                            <a href="/">Inicio</a>
                            <a href="/nosotros">Quienes somos</a>
                            <?php echo $inicio ? "<a href='#servicios'>Servicios</a>" : ""; ?>
                            <a href="/propiedades">Proyectos</a>
                            <a href="/blog">Blog</a>
                            <a href="/contacto">Contactos</a>
                            <?php if ($auth) : ?>
                                <a href="/admin">Administrar Productos</a>
                                <a href="/logout">Cerrar Sección</a>
                            <?php endif ?>
                            <div class="moon-dark">
                                <img src="/build/img/dark-mode.svg" alt="boton dark mode" class="dark-mode-boton">
                            </div>
                        </nav>
                    </div>
                </div>
                <!--Fin de barra--->
                <?php echo $inicio ? "<h1>Proyectos Residenciales para todo Paraguay</h1>" : "";
                ?>
            </div>
        </div>
    </header>

    <?php echo $contenido; ?>

    <div class="whatsapp-icon">
        <a href="https://wa.me/+595973870444?text=desde%20la%20pagina%20web%20construtecto">
            <img src="/build/img/whatsapp-icon.png" alt="whatsapp">
        </a>
    </div>

    <footer class="footer seccion">
        <div class="grid-footer">
            <div class="contenedor contenedor-footer">
                <a href="/">
                    <img src="/build/img/logo.png" alt="icono menu responsive">
                </a>
                <nav class="navegacion-footer">
                    <a href="/">Inicio</a>
                    <a href="/nosotros">Quienes somos</a>
                    <a href="#servicios">Servicios</a>
                    <a href="/propiedades">Proyectos</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contactos</a>
                </nav>
            </div>
            <div class="contenedor contenedor-footer">
                <p>¡Síguenos!</p>
                <img class="icono" src=/build/img/facebook.png alt="facebook">
                <img class="icono" src=/build/img/instagram.png alt="instagram">
                <img class="icono" src=/build/img/tik-tok.png alt="tik-tok">
            </div>
            <div class="contenedor contenedor-footer">
                <p>Contáctenos:</p>
                <a href="#">+595 666777</a>
                <a href="#">+595 666777</a>
                <a href="#">+595 666777</a>
                <a href="#">Correo@correo.com</a>
            </div>
            <div class="contenedor contenedor-footer">
                <p>¡Visítanos!</p>
                <iframe class="map-view" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1070.1352048734686!2d-54.60758985965699!3d-25.55529237316649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f691baace079ab%3A0x63407ea8c20c7766!2sCONSTRUTECTO!5e0!3m2!1ses!2spy!4v1689904074540!5m2!1ses!2spy" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <a class="link-map" href="https://goo.gl/maps/SFHr9TCTEYeyFZUF8"><span class="material-symbols-outlined icon-map">
                        location_on
                    </span></a>
                <a class="link-map" href="https://goo.gl/maps/SFHr9TCTEYeyFZUF8">Ver ubicación</a>
            </div>
        </div>
        <p class="copyright">Todos los derechos Reservados <?php echo date("Y"); ?> &copy;</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="../build/js/bundle.min.js"></script>
</body>

</html>