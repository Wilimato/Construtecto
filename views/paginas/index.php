<main class="contenedor-iconos">
    <?php include 'iconos.php' ?>
</main>
<section class="presentation">
    <div class="presentation-content">

        <div class="presentation-text">
            <h2>¡Bienvenido a la página web de Construtecto! </h2>
            <p>Somos un estudio de arquitectura dedicado a crear espacios innovadores y funcionales que se adaptan a las necesidades de nuestros clientes. Explora nuestros proyectos destacados y descubre cómo podemos convertir tus ideas en realidad.</p>
            <a href="/nosotros" class="boton-negro">Saber más sobre nosotros</a>
        </div>
        <div class="presentation-image"><img src="./build/img/Arquitectos.png" alt="arquitectos"></div>
    </div>

</section>

<section class="slider-container">
    <div class="left-slide">
        <div style="background-color: #FD3555">
            <h1>Proyectos Completos</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sapiente quos asperiores maxime doloremque corrupti animi quidem, dicta tempora expedita nulla veritatis fugit alias laudantium, vero beatae. Ducimus, animi quas?</p>
        </div>
        <div style="background-color: #2A86BA">
            <h1>Diseños de Fachadas</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sapiente quos asperiores maxime doloremque corrupti animi quidem, dicta tempora expedita nulla veritatis fugit alias laudantium, vero beatae. Ducimus, animi quas?</p>
        </div>
        <div style="background-color: #252E33">
            <h1>Diseños de interiores</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sapiente quos asperiores maxime doloremque corrupti animi quidem, dicta tempora expedita nulla veritatis fugit alias laudantium, vero beatae. Ducimus, animi quas?</p>
        </div>
        <div style="background-color: #FFB866">
            <h1>Proyectos de alto nivel</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sapiente quos asperiores maxime doloremque corrupti animi quidem, dicta tempora expedita nulla veritatis fugit alias laudantium, vero beatae. Ducimus, animi quas?</p>
        </div>
    </div>
    <div class="right-slide">
        <div style="background-image: url('./build/img/destacada.jpg')"></div>
        <div style="background-image: url('./build/img/interiores.jpg')"></div>
        <div style="background-image: url('./build/img/fachadas.jpg')"></div>
        <div style="background-image: url('./build/img/diseno-moderno.jpg')"></div>
    </div>
    <div class="action-buttons">
        <button class="down-button">
            <i class="fas fa-arrow-down"></i>
        </button>
        <button class="up-button">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>
</section>

<section class="seccion contenedor">
    <h2>Servicios</h2>
    <?php

    include "servicios.php";


    ?>

</section>

<section class="imagen-contacto">
    <div class="background-redes">
        <h2>Seguinos en nuestras redes sociales</h2>
        <p>Seguinos en las Redes para más contenido sobre los proyectos, testimonios de clientes y más</p>
        <div class="imagen-content">
            <a href="#"><img src="/build/img/instagram-icon.png" alt="instagram"></a>
            <a href="https://www.facebook.com/construtectopy"><img src="/build/img/facebook-icon.png" alt="facebook"></a>
            <img src="/build/img/tiktok-icon.png" alt="tiktok">
        </div>
    </div>
</section>

<section class="seccion contenedor">
    <h2>Proyectos Finalizados</h2>

    <?php

    include "listado.php";


    ?>

    <div class="alinear-derecha">
        <a href="/propiedades" class="boton-gris">Ver Todas</a>
    </div>

</section>

<section class="contenedor-proveedores">
    <?php
    include "proveedores.php";

    ?>
</section>

<div class="contenedor">
    <section class="blog">
        <h3>Nuestro Blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>

                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                </a>
            </div>
        </article>
        <!---Fin de entrada blog-->

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p>Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>

                    <p>Maxima el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                </a>
            </div>
        </article>
        <!---Fin de entrada blog-->
        <div class="alinear-derecha">
            <a href="/blog" class="boton-gris">Ver Todas</a>
        </div>
    </section>
    <!--Fin Section Blog-->

</div>

<main class="contenedor dark-color">
    <?php
    if ($mensaje) {
    ?>
        <p class="alerta exito"> <?php echo $mensaje ?> </p>';
    <?php
    }
    ?>
    <h2>Llene el formulario de contacto</h2>
    <form class="formulario" action="/" method="POST">
        <fieldset>
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]">

            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="contacto[mensaje]"></textarea>
        </fieldset>

        <fieldset>
            <label for="opciones">Selecciona el Servicio de tu interés:</label>
            <select id="opciones" name="contacto[tipo]">
                <option value="" disabled selected>--Seleccione--</option>
                <option value="anteproyecto">Anteproyecto</option>
                <option value="proyecto ejecutivo">Proyecto Ejecutivo</option>
                <option value="diseño de interior">Diseño de Interior</option>
                <option value="topografía">Topografía</option>
                <option value="fiscalización de obra">Fiscalización de Obra</option>
                <option value="construcción">Construcción</option>
                <option value="Reforma">Reforma</option>
                <option value="materiales de construcción">Materiales de Construcción</option>
            </select>
        </fieldset>

        <fieldset>
            <label>Como desea ser contactado</label>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]">

                <label for="contactar-email">E-mail</label>
                <input type="radio" value="email" id="contactar-email" name="contacto[contacto]">
            </div>

            <div id="contacto"></div>

        </fieldset>

        <input type="submit" value="Enviar" class="boton-gris">

    </form>
</main>