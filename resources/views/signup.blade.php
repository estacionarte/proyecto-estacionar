@extends('layouts.app')
@section('title') Signup @endsection
@section('signup')

<div class="container">

  <div class="bodies-main-content">

    <hr>

    <h1>Crear Cuenta Nueva</h1>

    <section class="signup">

      <div class="form-generico">

        <form action="{{ route('signup') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

          <input type="text" placeholder="Nombre" name="firstName" class="form-firstname" value="{{ old('firstName') }}">

          <input type="text" placeholder="Apellido" name="lastName" class="form-lastname" value="{{ old('lastNam') }}">

          <!-- <label for="" class="form-birthdate-label">Fecha de Nacimiento:</label> -->

          <input type="number" placeholder="dd" name="birthDay" min="1" max="31" class="form-birthdate" value="{{ old('birthDay') }}">

          <input type="number" placeholder="mm" name="birthMonth" min="1" max="12" class="form-birthdate" value="{{ old('birthMonth') }}">

          <input type="number" placeholder="aaaa" name="birthYear" min="1900" max="2010" class="form-birthdate" value="{{ old('birthYear') }}">

          <input type="email" placeholder="E-Mail" name="email" value="{{ old('email') }}">

          <!-- <input type="tel" placeholder="Teléfono Móvil" name="telefono" style="" value="<?php echo (isset($_COOKIE['telefono']) && !empty($_COOKIE['telefono'])) ? $_COOKIE['telefono'] : ""; ?>"> -->

          <input type="password" placeholder="Contraseña" name="password">

          <input type="password" placeholder="Confirmar Contraseña" name="confirmar-password">

          <!-- <?php $tipo = isset( $_COOKIE['interes']) ? $_COOKIE['interes'] : ''; ?>

          <select name="interes" style="">
            <option value="">Interés Principal</option>
            <option value="locatario" <?php echo $tipo=='locatario'?$s:''; ?>>Buscar estacionamiento</option>
            <option value="propietario" <?php echo $tipo=='propietario'?$s:''; ?>>Ofrecer estacionamiento</option>
            <option value="ambos" <?php echo $tipo=='ambos'?$s:''; ?>>Ambos</option>
          </select> -->

          <input type="file" name="profilePic" accept="image/*">

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
