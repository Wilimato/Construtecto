<div class="contenedor contenedor-anuncios">
    <?php
    $limite = 9;
    foreach ($propiedades as $propiedad) :
    ?>
        <div class="card-propiedades">

            <div class="imagen-content-propiedades">
                <span class="overlay-propiedades"></span>
                <div class="card-image-propiedades">
                    <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio" class="card-img-propiedades">
                </div>
            </div>

            <div class="card-content-propiedades">
                <h2 class="name"><?php echo $propiedad->titulo; ?></h2>
                <p class="description"><?php echo $propiedad->descripcion; ?></p>
                <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="button-slider">Ver Propiedad</a>
            </div>
            <!--contenido Anuncio-->
        </div>
        <!--Anuncio-->

    <?php endforeach; ?>
</div>