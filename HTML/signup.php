<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>EstacionARte</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

  <div class="container">

    <?php require_once('header.php'); ?>

    <div class="bodies-main-content">

      <hr>

      <h1>Crear Cuenta Nueva</h1>

      <section class="signup">

        <div class="form-generico">

          <form action="" method="post">
            <input type="text" placeholder="Nombre" name="firstName" class="form-firstname" required>
            <input type="text" placeholder="Apellido" name="lastName" class="form-lastname" required>
            <input type="date" placeholder="Fecha de Nacimiento" name="birthDate" max="2002-12-31"required>
            <select name="sexo" required>
              <option value="" selected>Sexo</option>
              <option value="male">Femenino</option>
              <option value="female">Masculino</option>
              <option value="other">Otro</option>
            </select>
            <input type="text" placeholder="Ciudad" name="ciudad" id="pac-input" required>
            <select name="interes" required>
              <option value="" selected>Interés Principal</option>
              <option value="locatario">Buscar estacionamiento</option>
              <option value="propietario">Ofrecer estacionamiento</option>
              <option value="ambos">Ambos</option>
            </select>
            <input type="email" placeholder="E-Mail" name="email" required>
            <input type="email" placeholder="Confirmar E-Mail" name="confirmar-email" required>
            <input type="password" placeholder="Contraseña" name="password" required>
            <input type="password" placeholder="Confirmar Contraseña" name="confirmar-password" required>
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
  <script>
  function initMap() {
    var input = document.getElementById('pac-input');
    var autocomplete = new google.maps.places.Autocomplete(input);
  };
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSkfauiLSZEhmyR3Yti92BCrmMCFbqB0Y&libraries=places&callback=initMap" async defer></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>
</body>
</html>
