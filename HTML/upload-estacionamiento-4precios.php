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
        <div class="uploadEstacionamiento-progressBar-progress4"></div>
      </div>

      <h1>Cargar Estacionamiento - Precio</h1>

      <section class="uploadEstacionamiento">

        <div class="form-generico">

          <form action="upload-estacionamiento-1infogeneral.php" method="post" enctype="multipart/form-data" class="form-uploadEstacionamiento">

            <label for="" class="upload-label-titulo">¿Cuál va a ser el precio por minuto de tu espacio?</label>

            <div class="upload-div-precio">
              <label for="" class="upload-label-precioPorMinutoSigno">$</label>
              <input type="number" placeholder="0,75" name="precioPorMinuto" class="upload-input-precioPorMinuto" min="0,1" max="2">
              <label for="" class="upload-label-precioPorMinuto">por minuto</label>
            </div>

            <label for="" class="upload-label-titulo">¿Cuál va a ser el descuento para alquileres prolongados?</label>

            <div class="upload-div-precio">
              <input type="number" placeholder="20" name="descuentoPorMinuto" class="upload-input-descuentoPorMinuto" min="0" max="90">
              <label for="" class="upload-label-descuentoPorMinutoPorcentaje">%</label>
              <label for="" class="upload-label-descuentoPorMinuto">por minuto a partir de la hora</label>
            </div>
            <p class="upload-p-descuentoPorMinuto">Precio por hora con descuento: $36</p>

            <div class="upload-div-precio">
              <input type="number" placeholder="35" name="descuentoPorMinuto" class="upload-input-descuentoPorMinuto" min="0" max="90">
              <label for="" class="upload-label-descuentoPorMinutoPorcentaje">%</label>
              <label for="" class="upload-label-descuentoPorMinuto">por minuto a partir de 6 horas</label>
            </div>
            <p class="upload-p-descuentoPorMinuto">Precio cada 6 horas con descuento: $175,50</p>

            <div class="upload-div-precio">
              <input type="number" placeholder="70" name="descuentoPorMinuto" class="upload-input-descuentoPorMinuto" min="0" max="90">
              <label for="" class="upload-label-descuentoPorMinutoPorcentaje">%</label>
              <label for="" class="upload-label-descuentoPorMinuto">por minuto a partir del día</label>
            </div>
            <p class="upload-p-descuentoPorMinuto">Precio por día con descuento: $324</p>

            <input type="submit" name="boton-submit" value="&#8249; Volver" class="upload-button-volver">
            <input type="submit" name="boton-submit" value="SIGUIENTE" class="upload-button-submit">

          </form>

        </div>

        <div class="upload-div-sideimage2"></div>

      </section>
    </div>
    <?php require_once('footer.php'); ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>
</body>
</html>
