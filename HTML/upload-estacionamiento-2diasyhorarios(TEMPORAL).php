?php

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
        <div class="uploadEstacionamiento-progressBar-progress2"></div>
      </div>

      <h1>Cargar Estacionamiento - Días y Horarios</h1>

      <section class="uploadEstacionamiento">

        <div class="form-generico">

          <form action="upload-estacionamiento-3estadias.php" method="post" enctype="multipart/form-data" class="form-uploadEstacionamiento">

            <label for="" class="upload-label-titulo">¿En qué días y horario va a estar disponible tu espacio?</label>

            <label for="" class="upload-label-diasemana">Lunes</label> <input type="number" placeholder="00" name="horaDia" class="upload-input-horadia" min="0" max="23"> <input type="number" placeholder="00" name="minutoDia" class="upload-input-horadia" min="0" max="59"> <span class="upload-span-separadorhoras">-</span> <input type="number" placeholder="00" name="horaDia" class="upload-input-horadia" min="0" max="23"> <input type="number" placeholder="00" name="minutoDia" class="upload-input-horadia" min="0" max="59">
            <label for="" class="upload-label-diasemana">Martes</label> <input type="number" placeholder="00" name="horaDia" class="upload-input-horadia" min="0" max="23"> <input type="number" placeholder="00" name="minutoDia" class="upload-input-horadia" min="0" max="59"> <span class="upload-span-separadorhoras">-</span> <input type="number" placeholder="00" name="horaDia" class="upload-input-horadia" min="0" max="23"> <input type="number" placeholder="00" name="minutoDia" class="upload-input-horadia" min="0" max="59">
            <label for="" class="upload-label-diasemana">Miércoles</label> <input type="number" placeholder="00" name="horaDia" class="upload-input-horadia" min="0" max="23"> <input type="number" placeholder="00" name="minutoDia" class="upload-input-horadia" min="0" max="59"> <span class="upload-span-separadorhoras">-</span> <input type="number" placeholder="00" name="horaDia" class="upload-input-horadia" min="0" max="23"> <input type="number" placeholder="00" name="minutoDia" class="upload-input-horadia" min="0" max="59">
            <label for="" class="upload-label-diasemana">Jueves</label> <input type="number" placeholder="00" name="horaDia" class="upload-input-horadia" min="0" max="23"> <input type="number" placeholder="00" name="minutoDia" class="upload-input-horadia" min="0" max="59"> <span class="upload-span-separadorhoras">-</span> <input type="number" placeholder="00" name="horaDia" class="upload-input-horadia" min="0" max="23"> <input type="number" placeholder="00" name="minutoDia" class="upload-input-horadia" min="0" max="59">
            <label for="" class="upload-label-diasemana">Viernes</label> <input type="number" placeholder="00" name="horaDia" class="upload-input-horadia" min="0" max="23"> <input type="number" placeholder="00" name="minutoDia" class="upload-input-horadia" min="0" max="59"> <span class="upload-span-separadorhoras">-</span> <input type="number" placeholder="00" name="horaDia" class="upload-input-horadia" min="0" max="23"> <input type="number" placeholder="00" name="minutoDia" class="upload-input-horadia" min="0" max="59">
            <label for="" class="upload-label-diasemana">Sábado</label> <input type="number" placeholder="00" name="horaDia" class="upload-input-horadia" min="0" max="23"> <input type="number" placeholder="00" name="minutoDia" class="upload-input-horadia" min="0" max="59"> <span class="upload-span-separadorhoras">-</span> <input type="number" placeholder="00" name="horaDia" class="upload-input-horadia" min="0" max="23"> <input type="number" placeholder="00" name="minutoDia" class="upload-input-horadia" min="0" max="59">
            <label for="" class="upload-label-diasemana">Domingo</label> <input type="number" placeholder="00" name="horaDia" class="upload-input-horadia" min="0" max="23"> <input type="number" placeholder="00" name="minutoDia" class="upload-input-horadia" min="0" max="59"> <span class="upload-span-separadorhoras">-</span> <input type="number" placeholder="00" name="horaDia" class="upload-input-horadia" min="0" max="23"> <input type="number" placeholder="00" name="minutoDia" class="upload-input-horadia" min="0" max="59">

            <input type="submit" name="boton-submit" value="Volver" class="upload-button-volver">
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
