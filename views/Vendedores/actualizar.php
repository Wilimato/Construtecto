<main class="contenedor">
    <h1>Actualizar Vendedor</h1>

    <a href="/admin" class="boton boton-gris">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach ?>

    <form class="formulario" method="POST">
        <?php
        include __DIR__ . "/formularios_vendedores.php";

        ?>

        <input type="submit" class="boton boton-gris" value="Guardar Cambios">

    </form>
</main>