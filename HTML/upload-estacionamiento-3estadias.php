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

      <div class="uploadEstacionamiento-progressBar">
        <div class="uploadEstacionamiento-progressBar-progress3"></div>
      </div>

      <h1>Cargar Estacionamiento - Estadías</h1>

      <section class="uploadEstacionamiento">

        <div class="form-generico">

          <form action="upload-estacionamiento-1infogeneral.php" method="post" enctype="multipart/form-data" class="form-uploadEstacionamiento">

            <label for="" class="upload-label-titulo">¿Cuánto tiempo pueden permanecer los vehículos?</label>

            <label for="" class="upload-label-tiempoMinimoyMax">Mínimo</label>
            <select name="medidaDeTiempo" class="upload-select-tiempoMinimoyMax">
              <option value="Minutos">minutos</option>
              <option value="Horas">horas</option>
              <option value="Dias">días</option>
            </select>
            <input type="number" placeholder="15" name="tiempoMinimoyMax" class="upload-input-tiempoMinimoyMax" min="0" max="10000">

            <label for="" class="upload-label-tiempoMinimoyMax">Máximo</label>
            <select name="medidaDeTiempo" class="upload-select-tiempoMinimoyMax">
              <option value="Minutos">minutos</option>
              <option value="Horas">horas</option>
              <option value="Dias">días</option>
            </select>
            <input type="number" placeholder="15" name="tiempoMinimoyMax" class="upload-input-tiempoMinimoyMax" min="0" max="10000">


            <input type="submit" name="boton-submit" value="Volver" class="upload-button-volver">
            <input type="submit" name="boton-submit" value="SIGUIENTE" class="upload-button-submit">

          </form>

        </div>

        <div class="upload-div-sideimage"></div>

      </section>
    </div>
    <?php require_once('footer.php'); ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>
</body>
</html>
