<?php

 ?>

<!DOCTYPE html>
<html>
  <?php require_once('head.php'); ?>
<body>

  <div class="container">

    <?php require_once('header.php'); ?>

    <div class="bodies-main-content">

      <hr>

      <h1>Cargar Estacionamiento - Información General</h1>

      <section class="cargaEstacionamiento-paso1">

        <?php
        // if ($camposVacios)
        //   echo "<p style='color:red'>Completar los campos vacíos</p>";
        // if (isset($_COOKIE['error']) && !empty($_COOKIE['error']))
        //   echo "<p style='color:red'>" . $_COOKIE['error'] . "</p>";
        ?>

        <div class="form-generico">

          <form action="estacionamiento-carga.php" method="post" enctype="multipart/form-data" class="form-cargaEstacionamiento">

            <label for="" class="">¿Donde está ubicado tu espacio?</label>
            <input type="text" placeholder="Ej: Av. Eduardo Madero 399" name="direccion" class="" style="<?php echo $emptyFields['direccion']; ?>" value="<?php echo (isset($_COOKIE['direccion']) && !empty($_COOKIE['direccion'])) ? $_COOKIE['direccion'] : ""; ?>">

            <?php
             $s = "selected";
             $tipo = isset( $_COOKIE['tipoCochera']) ? $_COOKIE['tipoCochera'] : '';
            ?>

            <label for="" class="">¿Qué tipo de espacio es?</label>
            <select name="tipoCochera" style="<?php echo $emptyFields['tipoCochera']; ?>">
              <option value="">Elige una opción</option>
              <option value="Cochera privada" <?php echo $tipo=='cocheraPrivada'?$s:''; ?>>Cochera privada</option>
              <option value="Playa de estacionamiento" <?php echo $tipo=='playaEstacionamiento'?$s:''; ?>>Playa de estacionamiento</option>
            </select>

            <label for="" class="">¿Cuántos vehículos se permiten?</label>
            <label for="" class="">Autos</label> <input type="number" placeholder="" name="cantAutos" class="" min="0" max="1" value="<?php echo (isset($_COOKIE['cantAutos']) && !empty($_COOKIE['cantAutos'])) ? $_COOKIE['cantAutos'] : 0; ?>">
            <label for="" class="">Motos</label> <input type="number" placeholder="" name="cantMotos" class="" min="0" max="4" value="<?php echo (isset($_COOKIE['cantMotos']) && !empty($_COOKIE['cantMotos'])) ? $_COOKIE['cantMotos'] : 0; ?>">
            <label for="" class="">Bicicletas</label> <input type="number" placeholder="" name="cantBicicletas" class="" min="0" max="4" value="<?php echo (isset($_COOKIE['cantBicicletas']) && !empty($_COOKIE['cantBicicletas'])) ? $_COOKIE['cantBicicletas'] : 0; ?>">

            <label for="" class="">¿Tiene alguno de los siguientes servicios especiales?</label>
            <input type="checkbox" name="serviciosEspeciales" value="aptoDiscapacitados" id="aptoDiscapacitados"><label for="aptoDiscapacitados">Apto para discapacitados</label>
            <input type="checkbox" name="serviciosEspeciales" value="cargaElectricos" id="cargaElectricos"><label for="cargaElectricos">Carga para autos eléctricos</label>

            <label for="" class="">Información extra (visible por todos) -opcional-</label>
            <textarea name="name" rows="5" cols="80"></textarea>

            <label for="" class="">Información extra (únicamente visible por quienes alquilen tu espacio) -opcional-</label>
            <textarea name="name" rows="5" cols="80"></textarea>

            <input type="file" name="profilePic" accept="image/*" style="<?php echo $emptyFields['profilePic']; ?>" multiple>

            <input type="submit" name="boton-submit" value="CREAR CUENTA">
          </form>

        </div>

      </section>
    </div>
    <?php require_once('footer.php'); ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>
</body>
</html>
