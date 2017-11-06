<?php
// +LOGIN + LOGOUT + RECORDARME
// spl_autoload_register(function($nombreClase){
//   include "$nombreClase.php";
// });
require_once("db.php");

class Authenticator {

  public function __construct() {
    session_start();

    if (isset($_COOKIE["user"]) && !$this->isLoggedIn()) {
      $this->loguear($_COOKIE["user"]);
    }
  }

  public function isLoggedIn() {
    if (isset($_SESSION["user"])) {
      return true;
    }
    else {
      return false;
    }
  }

  public function redirectLoggedUser() {
    if (session_status() !== PHP_SESSION_ACTIVE)
      session_start();

    if ($this->isLoggedIn()){
      header("Location:index.php");
      exit;
    }
  }

  public function redirectNotLoggedUser() {
    if (session_status() !== PHP_SESSION_ACTIVE)
      session_start();

    if (!$this->isLoggedIn()){
      header("Location:index.php");
      exit;
    }
  }

  public function logout() {
    unset($_SESSION["user"]);
    session_destroy();
    setcookie("user", "", -1);
  }

  public function obtenerUsuarioLogueado(db $db) {
    if ($this->isLoggedIn()) {
      $email = $_SESSION["user"];
      return $db->traerPorEmail($email);
    } else {
      return null;
    }
  }

  public function loguear($email) {
    $_SESSION["user"] = $email;
  }

}



?>
