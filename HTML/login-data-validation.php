<?php
require_once('functions.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $user = login($_POST["email"],$_POST["password"]);
  if (is_array($user)) {
    session_start();
    $_SESSION['user'] = $user;
    header('Location: profile.php');
  } else {
    $login_error = $user;

    switch ($login_error->type) {
      case 1:
        $label = ".user_not_found";
        break;
      case 2:
        $label = ".wrong_password";
        break;
    }
  }
}
?>
