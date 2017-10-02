<?php
require_once('constants.php');

function jason2array($file) {

  $url = JSON_FOLDER . $file; // JSON_FOLDER: 'json/'
  $json = file_get_contents($url);

  if ($json) {
    return json_decode($json, TRUE);
  } else {
    return FALSE;
  }
}

function login($email,$password) {
  $user = [];
  $error = new stdClass();

// Get users
  $users = jason2array('registeredUsers.json');

  if (!$users) {
//  fatal error
    $error->type = 3;
    $error->desc = 'Error al cargar registeredUsers.json';
    $user["error"] = $error;
    return $user;
  }

// Search entered user
  $key = array_search($email, array_column($users, 'email'));
  if ($email == $users[$key]["email"]) {
    // password validation
    $db_password = $users[$key]['password'];
    if (password_verify($password, $db_password)) {
//    Right password; Return user data
      $user = $users[$key];
      $error->type = 0;
      $user["error"] = $error;
      return $user;
    } else {
//    Wrong password
      $error->type = 2;
      $error->desc = 'Contraseña incorrecta';
      $user["error"] = $error;
      return $user;
    }
  } else {
//  user not found
    $error->type = 1;
    $error->desc = 'El usuario no existe';
    $user["error"] = $error;
    return $user;
  }
}
?>
