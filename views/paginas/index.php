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

<main id="main" class="contenedor">
    <h1>Contacto</h1>

    <?php
    if ($mensaje) {
    ?>
        <p class="alerta exito"> <?php echo $mensaje ?> </p>';
    <?php
    }
    ?>

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center contacto-background">
                        <i class="bi bi-map"></i>
                        <h3>Nuestra Dirección</h3>
                        <p>Sobre la calle: C. Aquidaban, Presidente Franco</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center contacto-background">
                        <i class="bi bi-envelope"></i>
                        <h3>Email</h3>
                        <p>construtectospy@gmail.com</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center contacto-background">
                        <i class="bi bi-telephone"></i>
                        <h3>Llamanos</h3>
                        <p>(0984) 241 388</p>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <div class="row gy-4 mt-1">

                <div class="col-lg-6 ">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1070.1352048734686!2d-54.60758985965699!3d-25.55529237316649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f691baace079ab%3A0x63407ea8c20c7766!2sCONSTRUTECTO!5e0!3m2!1ses!2spy!4v1689904074540!5m2!1ses!2spy" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div><!-- End Google Maps -->

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row gy-4">
                            <div class="col-lg-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Tu Nombre" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Tu Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Título" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Mensaje" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->
</main>
</main>