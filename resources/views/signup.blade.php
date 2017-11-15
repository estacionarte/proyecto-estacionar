@extends('layouts.app')
@section('title') Signup @endsection
@section('signup')

<div class="container">

  <div class="bodies-main-content">

    <hr>

    <h1>Crear Cuenta Nueva</h1>

    <section class="signup">

      <?php
      if (isset($_COOKIE['camposVacios']))
        if ($_COOKIE['camposVacios'] == "TRUE")
          echo "<p style='color:red'>Completar los campos vacíos</p>";
      if (isset($_COOKIE['error']) && !empty($_COOKIE['error']))
        echo "<p style='color:red'>" . $_COOKIE['error'] . "</p>";
      if (isset($_COOKIE['errorProfilePic']) && !empty($_COOKIE['errorProfilePic']))
        echo "<p style='color:red'>" . $_COOKIE['errorProfilePic'] . "</p>";
      ?>

      <div class="form-generico">

        <form action="signup-exefunctions.php" method="post" enctype="multipart/form-data">

          <input type="text" placeholder="Nombre" name="firstName" class="form-firstname" style="" value="<?php echo (isset($_COOKIE['firstName']) && !empty($_COOKIE['firstName'])) ? $_COOKIE['firstName'] : ""; ?>">

          <input type="text" placeholder="Apellido" name="lastName" class="form-lastname" style="" value="<?php echo (isset($_COOKIE['lastName']) && !empty($_COOKIE['lastName'])) ? $_COOKIE['lastName'] : ""; ?>">

          <!-- <label for="" class="form-birthdate-label">Fecha de Nacimiento:</label> -->

          <input type="number" placeholder="dd" name="birthDay" min="1" max="31" class="form-birthdate" style="" value="<?php echo (isset($_COOKIE['birthDay']) && !empty($_COOKIE['birthDay'])) ? $_COOKIE['birthDay'] : ""; ?>">

          <input type="number" placeholder="mm" name="birthMonth" min="1" max="12" class="form-birthdate" style="" value="<?php echo (isset($_COOKIE['birthMonth']) && !empty($_COOKIE['birthMonth'])) ? $_COOKIE['birthMonth'] : ""; ?>">

          <input type="number" placeholder="aaaa" name="birthYear" min="1900" max="2010" class="form-birthdate" style="" value="<?php echo (isset($_COOKIE['birthYear']) && !empty($_COOKIE['birthYear'])) ? $_COOKIE['birthYear'] : ""; ?>">



          <input type="email" placeholder="E-Mail" name="email" style="" value="<?php echo (isset($_COOKIE['email']) && !empty($_COOKIE['email'])) ? $_COOKIE['email'] : ""; ?>">

          <!-- <input type="tel" placeholder="Teléfono Móvil" name="telefono" style="" value="<?php echo (isset($_COOKIE['telefono']) && !empty($_COOKIE['telefono'])) ? $_COOKIE['telefono'] : ""; ?>"> -->

          <input type="password" placeholder="Contraseña" name="password" style="">

          <input type="password" placeholder="Confirmar Contraseña" name="confirmar-password" style="">

          <!-- <?php $tipo = isset( $_COOKIE['interes']) ? $_COOKIE['interes'] : ''; ?>

          <select name="interes" style="">
            <option value="">Interés Principal</option>
            <option value="locatario" <?php echo $tipo=='locatario'?$s:''; ?>>Buscar estacionamiento</option>
            <option value="propietario" <?php echo $tipo=='propietario'?$s:''; ?>>Ofrecer estacionamiento</option>
            <option value="ambos" <?php echo $tipo=='ambos'?$s:''; ?>>Ambos</option>
          </select> -->

          <input type="file" name="profilePic" accept="image/*" style="">

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

</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="js/menu.js"></script>

@endsection
