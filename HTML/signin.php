<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>EstacionARte</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <div class="container">
    <?php require_once('header.php'); ?>
    <div class="recuperar-main-content">
      <h1 class="tittle-signin">Iniciar sesión</h1>
      <section class="recuperar-password">
        <div>
          <form action="" method="post">
            <input type="email" class="form-control" placeholder="Email"/>
            <input type="password" class="form-control" placeholder="Contraseña"/>
            <input type="checkbox"> Recordarme
            <input type="submit" name="" value="Continuar">
          </form>
        </div>
      </section>
      <a href="forgot-password.php">Olvidé mi contraseña</a>
      <a href="signup.php" class="text-center"> Registrate</a>
    </div>
    <?php require_once('footer.php'); ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>
</body>
</html>
