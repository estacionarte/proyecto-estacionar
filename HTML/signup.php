<?php

  require_once('signup-procesamiento.php');

 ?>

<!DOCTYPE html>
<html>
  <?php require_once('head.php'); ?>
<body>

  <div class="container">

    <?php require_once('header.php'); ?>

    <div class="bodies-main-content">

      <hr>

      <h1>Crear Cuenta Nueva</h1>

      <section class="signup">

        <?php
        if ($camposVacios) {
          echo "<p style='color:red'>Completar los campos vacíos</p>";
        }
        ?>

        <div class="form-generico">

          <form action="signup.php" method="post">
            <input type="text" placeholder="Nombre" name="firstName" class="form-firstname" style="<?php echo $emptyFields['firstName']; ?>" value="<?php echo $values["firstName"]; ?>" required>
            <input type="text" placeholder="Apellido" name="lastName" class="form-lastname" style="<?php echo $emptyFields['lastName']; ?>" value="<?php echo $values["lastName"]; ?>" required>
            <input type="number" placeholder="dd" name="birthDay" class="form-birthdate" style="<?php echo $emptyFields['birthDay']; ?>" value="<?php echo $values["birthDay"]; ?>" required><label>/</label>
            <input type="number" placeholder="mm" name="birthMonth" class="form-birthdate" style="<?php echo $emptyFields['birthMonth']; ?>" value="<?php echo $values["birthMonth"]; ?>" required><label>/</label>
            <input type="number" placeholder="aaaa" name="birthYear" class="form-birthdate" style="<?php echo $emptyFields['birthYear']; ?>" value="<?php echo $values["birthYear"]; ?>" required>
            <select name="sexo" style="<?php echo $emptyFields['sexo']; ?>" required>
              <option value="" selected>Sexo</option>
              <option value="female">Femenino</option>
              <option value="male">Masculino</option>
              <option value="other">Otro</option>
            </select>
            <select name="localidad" style="<?php echo $emptyFields['localidad']; ?>" required>
              <option value="" selected>Barrio</option>
              <?php

              $archivojson = file_get_contents("json/localidades.json");
              $localidades = json_decode($archivojson,true);

              foreach ($localidades["barriosAZ"] as $key) { ?>
                <option value="<?php echo $key ?>"><?php echo $key ?></option>
              <?php } ?>
            </select>
            <!-- <input type="text" placeholder="Ciudad" name="ciudad" id="pac-input" required> -->
            <input type="email" placeholder="E-Mail" name="email" style="<?php echo $emptyFields['email']; ?>" value="<?php echo $values["email"]; ?>" required>
            <!-- <input type="email" placeholder="Confirmar E-Mail" name="confirmar-email" required> -->
            <input type="tel" placeholder="Teléfono Móvil" name="telefono" style="<?php echo $emptyFields['telefono']; ?>" value="<?php echo $values["telefono"]; ?>" required>
            <input type="password" placeholder="Contraseña" name="password" style="<?php echo $emptyFields['password']; ?>" value="<?php echo $values["password"]; ?>" required>
            <!-- <input type="password" placeholder="Confirmar Contraseña" name="confirmar-password" required> -->
            <select name="interes" style="<?php echo $emptyFields['interes']; ?>" required>
              <option value="" selected>Interés Principal</option>
              <option value="locatario">Buscar estacionamiento</option>
              <option value="propietario">Ofrecer estacionamiento</option>
              <option value="ambos">Ambos</option>
            </select>
            <input type="submit" name="boton-submit" value="CREAR CUENTA">
          </form>

        </div>

        <p>Al hacer click en "Crear Cuenta", aceptas los términos y condiciones y la política de privacidad de EstacionARte.</p>

        <a href="signin.php">¿Ya estás registrado?</a>

        <div class="login-separador">
          <span>O</span>
        </div>

        <a href="#" class="facebook-login-button">Crear Cuenta con Facebook</a>
        <a href="#" class="google-login-button">Crear Cuenta con Google</a>

      </section>
    </div>
    <?php require_once('footer.php'); ?>
  </div>
  <!-- <script>
  function initMap() {
    var input = document.getElementById('pac-input');
    var autocomplete = new google.maps.places.Autocomplete(input);
  };
  </script> -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSkfauiLSZEhmyR3Yti92BCrmMCFbqB0Y&libraries=places&callback=initMap" async defer></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>
</body>
</html>
