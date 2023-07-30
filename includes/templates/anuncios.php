<?php

use App\Propiedad;


if ($_SERVER["SCRIPT_NAME"] === "/anuncios.php") {
    $propiedades = Propiedad::all();
} else {
    $propiedades = Propiedad::get(3);
}

?>

<div class="contenedor-anuncios">

    <?php foreach ($propiedades as $propiedad) : ?>

        <div class="anuncio">

            <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <div class="descripcion">
                    <p><?php echo $propiedad->descripcion; ?></p>
                </div>
                <p class="precio">$ <?php echo $propiedad->precio; ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="estacionamiento">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="dormitorio">
                        <p><?php echo $propiedad->habitacion; ?></p>
                    </li>
                </ul>
                <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="boton boton-amarillo-block">Ver Propiedad</a>
            </div>
            <!--contenido Anuncio-->
        </div>
        <!--Anuncio-->

    <?php endforeach; ?>

</div>
<!--Contenedor de Anuncios-->

<?php

//Cerrar la Conexión 

mysqli_close($db);

?>