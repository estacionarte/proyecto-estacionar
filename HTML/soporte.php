<?php

require_once("clases/authenticator.php");
require_once("clases/validator.php");
require_once("clases/dbJSON.php");
require_once("clases/dbMySQL.php");

$auth = new Authenticator();
$validator = new Validator();
$db = new DBMySql();

?>
