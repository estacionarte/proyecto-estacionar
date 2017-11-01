<?php

require_once("db.php");
require_once("usuario.php");

class DBJSON extends db {
  private $arch;

  public function __construct(){
    $this->arch = "registeredUsers.json";
  }
}

?>
