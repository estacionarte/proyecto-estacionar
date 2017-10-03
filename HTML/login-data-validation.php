<?php
require_once('functions.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
  $user = login($_POST["email"],$_POST["password"]);
  if ($user["error"]->type == 0) {
    $_SESSION['user'] = $user;
    unset($_SESSION["login_error"]);
    redirectTo("profile.php");
  } else {
    $login_error = $user["error"];
    $_SESSION["login_error"] = $login_error;
    unset($_SESSION["user"]);
    switch ($login_error->type) {
      case 1:
        $label = ".user_not_found";
        break;
      case 2:
        $label = ".wrong_password";
        break;
      case 3:
        $label = ".user_not_found";
        break;
    }
  }
}

function redirectTo($url = "index.php", $status_code = false) {
  header("Location:$url",TRUE, $status_code ? $status_code : 301);
  die();
}
?>
