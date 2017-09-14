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

      <h1>Mi Perfil / Mi Cuenta</h1>

      <section class="profile">

        <nav class="profile-nav">
          <a href="#">Datos Personales</a>
          <a href="#">Mis Vehículos</a>
          <a href="#">Mis Estacionamientos</a>
          <a href="#">Reputación</a>
        </nav>

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
