<?php

function saveProfilePic() {
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

  // Devuelvo el nombre con el que se guardó la imagen
  return $name_pic;
}


function signUpUser(){
  // Abro el archivo donde guardo los registros
  $file = "json/registeredUsers.json";
  $extract = file_get_contents($file);
  $data = json_decode($extract, true);

  // Usando la función le asigno a la variable el nombre de la foto o un array con un error
  $pathPhoto = saveProfilePic();

  // Defino ID para el nuevo user
  $id = count($data);
  $id += 1;

  // Combino los campos de birthdate en uno
  $birthdate = $_POST['birthDay'] . "-" . $_POST['birthMonth'] . "-" . $_POST['birthYear'];

  // Encripto la contraseña
  $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

  // Guardo los datos recibidos del formulario en una nueva variable
  $newUser = [
    "id" => $id,
    "firstName" => $_POST['firstName'],
    "lastName" => $_POST['lastName'],
    "birthDate" => $birthdate,
    // "birthDay" => $_POST['birthDay'],
    // "birthMonth" => $_POST['birthMonth'],
    // "birthYear" => $_POST['birthYear'],
    // "sexo" => $_POST['sexo'],
    // "localidad" => $_POST['localidad'],
    "email" => $_POST['email'],
    // "telefono" => $_POST['telefono'],
    "password" => $password,
    // "interes" => $_POST['interes'],
    "profilePic" => $pathPhoto
  ];

  // Guardo todo en el archivo inicial
  array_push($data, $newUser);
  $data = json_encode($data);
  file_put_contents($file, $data);

}


// Defino array de campos vacíos

$emptyFields = [
  "firstName" => "",
	"lastName" => "",
	"birthDay" => "",
	"birthMonth" => "",
	"birthYear" => "",
  // "sexo" => "",
  // "localidad" => "",
  "email" => "",
  // "telefono" => "",
  "password" => "",
  "confirmar-password" => "",
  // "interes" => "",
  "profilePic" => ""
];

// Array global de mensajes de errores para uso en las funciones
$errors_file = [
  1 => 'La foto de perfil subida excede el tamaño máximo',
  2 => 'La foto de perfil subida excede el tamaño permitido', // Según lo definido en el front
  3 => 'No se pudo completar la carga de la foto de perfil. Intente nuevamente.', // El archivó se subió parcialmente
  4 => 'La foto de perfil es requerida', // No se subió ningún archivo
  6 => 'Falta la carpeta temporal',
  7 => 'No se pudo escribir el fichero en el disco. Verificar perimsos',
  8 => 'Otra aplicación ha detenido la subida de la foto, verificar configuracion del server.'
];

// Creo la variable $errors para marcar el tipo de errores que surgieron
$errors = '';

/** FUNCIONES PARA REDIRECCIONAR
 * @param string $url
 * @param bool $permanent
 */

function Redirect($url = 'signup.php', $permanent = false) {
  header('Location: ' . $url, true, $permanent ? 301 : 302);
  exit();
}

function RedirectSuccess($url = 'profile.php', $permanent = false) {
  header('Location: ' . $url, true, $permanent ? 301 : 302);
  exit();
}

// Defino variable para detectar envío de POST
$isReceived = false;

// Defino variable para definir si carga de foto está OK
$profilePicSuccess = false;

// Defino variable para chequear si quedaron campos vacíos
$camposVacios = false;

// Función que realiza todo el proceso si existe petición POST

function completeSignUp() {

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    global $isReceived;
    $isReceived = true;
    global $emptyFields;
    global $camposVacios;

    // Recorro form chequeando si los campos están vacíos o no
    foreach ($_POST as $key_post => $value_post) {
      if(empty($_POST[$key_post])){
        $emptyFields[$key_post] = "border: solid 2px red";
        setcookie("EMPTY" . $key_post, "border: solid 2px red", time() + 2);
      } elseif ($key_post != 'password')
        setcookie($key_post, $_POST[$key_post], time() + 2);
    }

    global $errors;

    // Valido si la foto tiene errores
    if ($_FILES["profilePic"]["error"] != UPLOAD_ERR_OK) {
      $emptyFields["profilePic"] = "border: solid 2px red";
      setcookie("EMPTYprofilePic", "border: solid 2px red", time() + 2);
      if ($_FILES["profilePic"]["error"] =! 4) {
        // global $errors;
        global $errors_file;
        $errors .= $errors_file[$_FILES["profilePic"]["error"]];
      }
    } else {
      // Obtengo la extensión del archivo
      $nombre = $_FILES["profilePic"]["name"];
      $ext = pathinfo($nombre, PATHINFO_EXTENSION);
      // Chequeo si es una de las extensiones que acepto
      if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") {
        $emptyFields["profilePic"] = "border: solid 2px red";
        setcookie("EMPTYprofilePic", "border: solid 2px red", time() + 2);
        $errors .= 'El tipo de imagen para la foto de perfil debe ser .jpg, .jpeg o .png.';
      } else {
        // Si está todo bien cambio el valor de la variable
        global $profilePicSuccess;
        $profilePicSuccess = true;
      }
    }

    // Abro el archivo donde guardo los registros
    $file = "json/registeredUsers.json";
    $extract = file_get_contents($file);
    $data = json_decode($extract, true);

    // Verifico si el e-mail ya existe
    $key = array_search($_POST['email'], array_column($data, 'email'));
    if ($_POST['email'] == $data[$key]["email"]) {
      $emptyFields["email"] = "border: solid 2px red";
      setcookie("EMPTYemail", "border: solid 2px red", time() + 2);
      $errors .= 'Ya existe un usuario registrado con este e-mail.';
    }

    // Verifico que las claves ingresadas sean iguales
    if ($_POST['password'] != $_POST['confirmar-password']) {
      $emptyFields["password"] = "border: solid 2px red";
      setcookie("EMPTYpassword", "border: solid 2px red", time() + 2);
      $emptyFields["confirmar-password"] = "border: solid 2px red";
      setcookie("EMPTYconfirmar-password", "border: solid 2px red", time() + 2);
      $errors .= 'Las claves no coinciden.';
    }

    // Si hay errores creo una cookie
    if ($errors != "") {
      setcookie('error', $errors, time() + 2);
    }

    // Chequeo si quedaron campos sin llenar en el formulario

    foreach ($emptyFields as $key => $value) {
      if ($value!="") {
        setcookie("camposVacios", "TRUE", time() + 2);
        global $camposVacios;
        $camposVacios = true;
      }
    }

    // Si se cumplen las condiciones completo el registro
    if (!$camposVacios && $isReceived && $profilePicSuccess ) {
      signUpUser();
      setcookie('success', 'Usuario registrado con exíto!', time() + 2);

      //Inicio sesión

      if (session_status() !== PHP_SESSION_ACTIVE)
      session_start();

      $user = [
        "firstName" => $_POST["firstName"],
        "lastName" => $_POST["lastName"],
        "email" => $_POST["email"],
        "profilePic" => saveProfilePic()
      ];

      $_SESSION['user'] = $user;

      // Redirecciono

      Redirect("signup-delete_cookies.php");
    } else {
      Redirect();
    }

  }

}


?>
