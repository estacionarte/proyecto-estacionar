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

// Get users
  $users = jason2array('registeredUsers.json');

  if (!$users) {
//  fatal error
    return 'fatal error';
  }

// Search entered user
  $key = array_search($email, array_column($users, 'email'));
  if ($email == $users[$key]["email"]) {
    // password validation
    $db_password = $users[$key]['password'];
    if (password_verify($password, $db_password)) {
//    Right password; Return user data
      return $users[$key];
    } else {
//    Wrong password
      $error = new stdClass();
      $error->type = 2;
      $error->desc = 'Contraseña incorrecta';
      return $error;
    }
  } else {
//  user not found
    $error = new stdClass();
    $error->type = 1;
    $error->desc = 'El usuario no existe';
    return $error;
  }
}
?>
