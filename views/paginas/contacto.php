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