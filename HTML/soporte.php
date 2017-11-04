<?php

require_once("clases/authenticator.php");
require_once("clases/validator.php");
require_once("clases/dbJSON.php");
require_once("clases/dbMySQL.php");

$auth = new Authenticator();
$validator = new Validator();
<<<<<<< HEAD
// $db = new DBJSON();
=======
>>>>>>> a5d4641323cec691814f361f8c54f5991b16e133
$db = new DBMySql();

?>
