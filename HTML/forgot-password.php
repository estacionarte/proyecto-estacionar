<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Recupero contraseña</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
  <body>
    <div class="container">

      <?php require_once('header.php'); ?>

      <div class="bodies-main-content">

        <hr>

        <h1>Recuperar Contraseña</h1>

        <section class="recuperar-password">

          <p>Para recuperar tu nombre de usuario y contaseña debes ingresar la dirección de e-mail con la que te registraste. Enviaremos los datos a esa dirección.</p>

          <div class="form-generico">

            <form action="" method="post">
              <input type="email" name="recuperar-email" placeholder="ejemplo@xyz.com">
              <input type="submit" name="recuperar-submit" value="RECUPERAR CONTRASEÑA">
            </form>

          </div>

          <p>Si todavía no tienes una cuenta puedes registrarte gratis haciendo <a href="signup.php">click aquí</a>.</p>

        </section>
        
      </div>

      <?php require_once('footer.php'); ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
    $('.toggle-nav').click(function (){
      $('.main-nav').slideToggle(100);
    });
  </script>
  </body>
</html>
