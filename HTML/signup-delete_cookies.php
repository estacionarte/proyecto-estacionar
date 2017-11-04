<?php

// Defino array de cookies a eliminar

$camposCookies = [
  "camposVacios",
  "firstName",
  "lastName",
  "birthDay",
  "birthMonth",
  "birthYear",
  // "sexo",
  // "localidad",
  "email",
  // "telefono",
  // "interes",
  "EMPTYfirstName",
  "EMPTYlastName",
  "EMPTYbirthDay",
  "EMPTYbirthMonth",
  "EMPTYbirthYear",
  // "EMPTYsexo",
  // "EMPTYlocalidad",
  "EMPTYemail",
  // "EMPTYtelefono",
  // "EMPTYinteres",
  "EMPTYprofilePic"
];

if (isset($_COOKIE['success']) || !empty($_COOKIE['success']) ) {
  foreach ($camposCookies as $value) {
    if (isset($_COOKIE[$value]))
      setcookie($value, null,time());
  }
}

if (!isset($_COOKIE['error']) && !isset($_COOKIE['success']) ) {
  foreach ($camposCookies as $value) {
    if (isset($_COOKIE[$value]))
      setcookie($value, null,time());
  }
}

header('Location:profile.php');

?>
