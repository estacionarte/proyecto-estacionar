<?php
require_once('functions.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  // set_user_name_cookie(array_key_exists('recordarme',$_POST) ? TRUE : FALSE, $_POST['email']);

  if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
  $user = login($_POST["email"],$_POST["password"]);
  if ($user["error"]["type"] == 0) {
    $_SESSION['user'] = $user;
    unset($_SESSION["login_error"]);
    header("Location: profile.php");
  } else {
    $login_error = $user["error"];
    $_SESSION["login_error"] = $login_error;
    unset($_SESSION["user"]);
    switch ($login_error["type"]) {
      case 1:
        $label = ".user_not_found";
        setcookie("loginError", "No existe un usuario registrado con el e-mail ingresado", time() + 2);
        header("Location:signin.php");
        break;
      case 2:
        $label = ".wrong_password";
        setcookie("loginError", "Contraseña incorrecta", time() + 2);
        header("Location:signin.php");
        break;
      case 3:
        $label = ".user_not_found";
        setcookie("loginError", "No existe un usuario registrado con el e-mail ingresado", time() + 2);
        header("Location:signin.php");
        break;
    }
  }
}
?>
