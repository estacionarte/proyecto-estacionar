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

        <div class="form-generico">

          <?php echo (isset($_COOKIE['error']) && !empty($_COOKIE['error'])) ? $_COOKIE['error'] : ""; ?>
          <?php echo (isset($_COOKIE['success']) && !empty($_COOKIE['success'])) ? $_COOKIE['success'] : ""; ?>

          <form action="signup-save-trufa.php" method="post" enctype="multipart/form-data">

            <input
            type="text"
            placeholder="Nombre"
            name="name"
            class="form-firstname"
            id="name"
            value="<?php echo (isset($_COOKIE['name']) && !empty($_COOKIE['name'])) ? $_COOKIE['name'] : ""; ?>">

            <input
            type="text"
            placeholder="Apellido"
            name="lastname"
            class="form-lastname"
            id="lastname"
            value="<?php echo (isset($_COOKIE['lastname']) && !empty($_COOKIE['lastname'])) ? $_COOKIE['lastname'] : ""; ?>">

            <input
            type="number"
            placeholder="dd"
            name="birthDay"
            class="form-birthdate"
            id="birthDay"
            value="<?php echo (isset($_COOKIE['birthDay']) && !empty($_COOKIE['birthDay'])) ? $_COOKIE['birthDay'] : ""; ?>">

            <!-- <label>/</label> -->

            <input
            type="number"
            placeholder="mm"
            name="birthMonth"
            class="form-birthdate"
            id="birthMonth"
            value="<?php echo (isset($_COOKIE['birthMonth']) && !empty($_COOKIE['birthMonth'])) ? $_COOKIE['birthMonth'] : ""; ?>">

            <!-- <label>/</label> -->

            <input
            type="number"
            placeholder="aaaa"
            name="birthYear"
            class="form-birthdate"
            id="birthYear"
            value="<?php echo (isset($_COOKIE['birthYear']) && !empty($_COOKIE['birthYear'])) ? $_COOKIE['birthYear'] : ""; ?>">

            <?php
             if( isset( $_POST['sexo'])) $_COOKIE['sexo'] = $_POST['sexo'];
             $s = ' selected="selected" ';
             $tipo = isset( $_COOKIE['sexo']) ? $_COOKIE['sexo'] : '';
            ?>

            <select name="sexo" id="sexo">
              <option value="">Genero</option>
              <option <?php echo $tipo=='female'?$s:''; ?> value="female">Soy Mujer</option>
              <option <?php echo $tipo=='male'?$s:''; ?> value="male">Soy Hombre</option>
              <option <?php echo $tipo=='other'?$s:''; ?> value="other">Otro</option>
            </select>

            <?php
             if( isset( $_POST['localidad'])) $_COOKIE['localidad'] = $_POST['localidad'];
             $s = ' selected="selected" ';
             $tipo = isset( $_COOKIE['localidad']) ? $_COOKIE['localidad'] : '';
            ?>

            <select name="localidad" id="localidad">
              <option value="" selected>Barrio</option>
              <?php

              $archivojson = file_get_contents("json/localidades.json");
              $localidades = json_decode($archivojson,true);

              foreach ($localidades["barriosAZ"] as $key) { ?>
                <option <?php echo $tipo == $key ? $s:''; ?> value="<?php echo $key ?>"><?php echo $key ?></option>
              <?php } ?>
            </select>
            <!-- <input type="text" placeholder="Ciudad" name="ciudad" id="pac-input" required> -->
            <input
            type="email"
            placeholder="E-Mail"
            name="useremail"
            id="useremail"
            value="<?php echo (isset($_COOKIE['useremail']) && !empty($_COOKIE['useremail'])) ? $_COOKIE['useremail'] : ""; ?>">
            <!-- <input type="email" placeholder="Confirmar E-Mail" name="confirmar-email" required> -->
            <input
            type="tel"
            placeholder="Teléfono Móvil"
            name="telefono"
            id="telefono"
            value="<?php echo (isset($_COOKIE['telefono']) && !empty($_COOKIE['telefono'])) ? $_COOKIE['telefono'] : ""; ?>">

            <input
            type="password"
            placeholder="Contraseña"
            name="password"
            id="password">

            <input
            type="password"
            placeholder="Repetir contraseña"
            name="equal_pass"
            id="equal_pass">

            <?php
             if( isset( $_POST['interes'])) $_COOKIE['interes'] = $_POST['interes'];
             $s = ' selected="selected" ';
             $tipo = isset( $_COOKIE['interes']) ? $_COOKIE['interes'] : '';
            ?>

            <select name="interes" id="interes">
              <option value="" selected>Interés Principal</option>
              <option <?php echo $tipo=='locatario'?$s:''; ?> value="locatario">Buscar estacionamiento</option>
              <option <?php echo $tipo=='propietario'?$s:''; ?> value="propietario">Ofrecer estacionamiento</option>
              <option <?php echo $tipo=='ambos'?$s:''; ?> value="ambos">Ambos</option>
            </select>

            <input
              type="file"
              name="profile_pic"
              id="profile_pic"
              accept="image/*">

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
