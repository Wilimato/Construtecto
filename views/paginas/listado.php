<div>
    <div class="slider-container-2 swiper">
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
                <?php foreach ($propiedades as $propiedad) : ?>
                    <div class="card swiper-slide">
                        <div class="imagen-content">
                            <span class="overlay"></span>
                            <div class="card-image">
                                <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio" class="card-img">
                            </div>
                        </div>
                        <div class="card-content">
                            <h2 class="name"><?php echo $propiedad->titulo; ?></h2>
                            <p class="description"><?php echo $propiedad->descripcion; ?></p>
                            <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="button-slider">Ver Propiedad</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>