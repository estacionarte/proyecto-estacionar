<?php
// +LOGIN + LOGOUT + RECORDARME
// spl_autoload_register(function($nombreClase){
//   include "$nombreClase.php";
// });
require_once("db.php");

class Authenticator {
  public function __construct() {
    session_start();
}



?>
