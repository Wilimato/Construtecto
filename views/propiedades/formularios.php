<fieldset>
    <legend>Información</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo Propiedad" value="<?php echo $propiedad->titulo; ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="propiedad[precio]" min="1" max="10000000" placeholder="Precio Propiedad" value="<?php echo $propiedad->precio; ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
    <?php
    if ($propiedad->imagen) :
    ?>
        <img src="../../imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
    <?php
    endif;
    ?>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo $propiedad->descripcion ?></textarea>

</fieldset>

<fieldset>
    <legend>Información de la Propiedad</legend>

    <label for="habitacion">habitacion:</label>
    <input type="number" id="habitacion" name="propiedad[habitacion]" placeholder="Ej: 3" min="1" max="9" value="<?php echo $propiedad->habitacion; ?>">

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="propiedad[wc]" placeholder="Ej: 3" min="1" max="9" value="<?php echo $propiedad->wc; ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej: 3" min="1" max="9" value="<?php echo $propiedad->estacionamiento; ?>">

</fieldset>


<fieldset>
    <legend>Vendedor</legend>

    <label for="vendedor">Vendedor</label>

    <select name="propiedad[vendedores_id]" id="vendedor">
        <option value="" disabled <?php echo $propiedad->vendedores_id === "" ? "selected" : ""; ?>>--Seleccionar--</option>
        <?php foreach ($vendedores as $vendedor) : ?>
            <option <?php echo $propiedad->vendedores_id === $vendedor->id ? "selected" : ""; ?> value="<?php echo $vendedor->id ?>"><?php echo $vendedor->nombre . " " . $vendedor->apellido ?></option>
        <?php endforeach ?>
    </select>

</fieldset>