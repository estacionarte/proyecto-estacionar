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
    <div class="recuperar-main-content">
      <section class="recuperar-password">
        <hr class="divisor"><h1>Crea tu cuenta</h1>
        <div>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Nombre" name="firstName" required/>
            <input type="text" class="form-control" placeholder="Apellido" name="lastName" required/>
            <label>
              Fecha de nacimiento
              <input type="date" class="form-control" placeholder="Fecha de nacimiento" name="birthdate" required/>
            </label>
            <label>
              Sexo
              <select>
                <option value="male">Femenino</option>
                <option value="female">Masculino</option>
                <option value="other">Otro</option>
                <option value="" selected></option>
              </select>
            </label>
            <input type="email" class="form-control" placeholder="Email" required/>
            <input type="text" class="form-control" placeholder="Ubicación" id="pac-input" required/>
            <input type="password" class="form-control" placeholder="Contraseña" required/>
            <input type="password" class="form-control" placeholder="Repetir Contraseña" required/>
            <input type="checkbox"> Acepto los términos y condiciones
            <input type="submit" name="" value="Continuar">
          </form>
        </div>
        <div class="accede-btn">
          <h5>¿Ya tenés una cuenta?</h5>
          <a href="signin.php">Accedé ahora</a>
        </div>
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
