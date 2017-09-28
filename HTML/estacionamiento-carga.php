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

            <input type="text" placeholder="Apellido" name="lastName" class="form-lastname" style="<?php echo $emptyFields['lastName']; ?>" value="<?php echo (isset($_COOKIE['lastName']) && !empty($_COOKIE['lastName'])) ? $_COOKIE['lastName'] : ""; ?>">



            <input type="number" placeholder="dd" name="birthDay" min="1" max="31" class="form-birthdate" style="<?php echo $emptyFields['birthDay']; ?>" value="<?php echo (isset($_COOKIE['birthDay']) && !empty($_COOKIE['birthDay'])) ? $_COOKIE['birthDay'] : ""; ?>">

            <input type="number" placeholder="mm" name="birthMonth" min="1" max="12" class="form-birthdate" style="<?php echo $emptyFields['birthMonth']; ?>" value="<?php echo (isset($_COOKIE['birthMonth']) && !empty($_COOKIE['birthMonth'])) ? $_COOKIE['birthMonth'] : ""; ?>">

            <input type="number" placeholder="aaaa" name="birthYear" min="1900" max="2010" class="form-birthdate" style="<?php echo $emptyFields['birthYear']; ?>" value="<?php echo (isset($_COOKIE['birthYear']) && !empty($_COOKIE['birthYear'])) ? $_COOKIE['birthYear'] : ""; ?>">

            <input type="file" name="profilePic" accept="image/*" style="<?php echo $emptyFields['profilePic']; ?>">

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
