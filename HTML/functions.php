<?php
require_once('constants.php');

function json2array($file) {

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
  $error = [
    'type' => '',
    'desc' => ''
  ];

// Get users
  $users = json2array('registeredUsers2.json');

  if (!$users) {
//  fatal error

    $error["type"] = 3;
    $error["desc"] = 'Error al cargar registeredUsers2.json';
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
      $error["type"] = 0;
      $user["error"] = $error;
      return $user;
    } else {
//    Wrong password
      $error["type"] = 2;
      $error["desc"] = 'Contraseña incorrecta';
      $user["error"] = $error;
      return $user;
    }
  } else {
//  user not found
    $error["type"] = 1;
    $error["desc"] = 'El usuario no existe';
    $user["error"] = $error;
    return $user;
  }
}

function set_user_name_cookie($recordarme, $email) {
  if ($recordarme){
//  Set cookies
    setcookie(COOKIE_REMEMBER_ME, TRUE);
    setcookie(COOKIE_USER_NAME, $email);
  } else {
//  Remove cookies
    setcookie(COOKIE_REMEMBER_ME,$recordarme,time()-1);
    setcookie(COOKIE_USER_NAME,$email,time()-1);
  }
}

function redirectLoggedUser() {
  if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

  if (isset($_SESSION['user'])){
    header("Location:index.php");
    exit;
  }
}

function redirectNotLoggedUser() {
  if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

  if (!isset($_SESSION['user'])){
    header("Location:index.php");
    exit;
  }
}
?>
