<?php

require_once('soporte.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $errors = $validator->validarDatosSignUp($db);
  $errors .= $validator->validarProfilePic($db);

  if ($errors == '' && !isset($_COOKIE['camposVacios'])) {

    // Combino los campos de birthdate en uno
    $birthDate = $_POST['birthDay'] . "-" . $_POST['birthMonth'] . "-" . $_POST['birthYear'];

    // Encripto la contraseña
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    // Creo el usuario
    $user = new Usuario ($_POST['firstName'],$_POST['lastName'],$birthDate,$_POST['email'],$password);
    $user = $db->guardarUsuario($user);

    // Subo la profile pic
    // Guardo el nombre y el archivo
    $nombre = $_FILES["profilePic"]["name"];
    $archivo = $_FILES["profilePic"]["tmp_name"];

    // Obtengo la extensión del archivo
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);

    // Empiezo a darle nombre al archivo
    $name_pic = $_POST['email'] . "_profilePic." . $ext;

    // Defino la ruta y el nombre con el cual se guradará la foto
    $path_and_name = dirname(__FILE__) . "/profile-pic/". $name_pic;

    // Guardo la imagen
    move_uploaded_file($archivo, $path_and_name);

    setcookie('success', 'Usuario registrado con exíto!', time() + 2);

    // Inicio sesión

    $auth->loguear($_POST['email']);
    setcookie("user", $_POST['email'], time()+60*60*24*365*5);

    // Redirecciono

    header('Location:signup-delete_cookies.php');

  }

}

header('Location:signup.php');

?>
