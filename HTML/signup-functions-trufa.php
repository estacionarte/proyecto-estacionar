<?php

// array global para uso en las funciones
$erros_file = [
  1 => 'La foto de perfil subida excede el tamaño necesario',
  2 => 'La foto de perfil subida excede el tamaño necesario definido en el front',
  3 => 'La foto de perfil ha sido subida parcialmente',
  4 => 'La IMAGEN de perfil es requerida',
  6 => 'Falta la carpeta temporal',
  7 => 'No se pudo escribir el fichero en el disco. Verificar perimsos',
  8 => 'Otra aplicacion ha detenido la subida de la foto, verificar configuracion del server.'
];

// defino los campos que quiero persistir
$persistence = [
  "useremail",
  "name",
  "lastname",
  "birthDay",
  "birthMonth",
  "birthYear",
  "sexo",
  "localidad",
  "telefono",
  "interes"
];

// variable para mensajes de errores
$errors;

/**
 * @param array $values
 * @param array $photo
 */
function doSave($values, $photo) {
  validData($values, $photo);
  insertInJson($values, $photo);
}

function validData($values, $photo) {

  // se incluye al array declarado globalmente
  global $erros_file;

  //defino el mensaje de errores de los campos
  global $errors;

  // defino una variable para la comparacion de las claves
  $isEmptyPass = false;
  $isEmptyEqua = false;

  // de fino el array de traduccion para los mensajes
  $translate = [
    "useremail"  => " EMAIL",
    "name"       => "NOMBRE",
    "lastname"   => "APELLIDO",
    "birthDay"   => "DIA",
    "birthMonth" => "MES",
    "birthYear"  => "AÑO",
    "telefono"   => "TELEFONO",
    "interes"    => "INTERES",
    "sexo"       => "GENERO",
    "localidad"  => "BARRIO",
    "password"   => "CONTRASEÑA",
    "equal_pass" => "REPETIR CONTRASEÑA"
  ];

    // se recorre la variable $values en forma de evaluar la key => value
  foreach ($values as $key => $value) {
    if (empty($values[$key])) // verifico si los datos estan vacios
      $errors .= "El Campo $translate[$key] es requerido<br>";
    else // en caso contrario persisto la data en el array values
      if ($key != 'password' && $key != 'equal_pass')
        setcookie($key, $values[$key]);
  }

          // se valida la la foto tiene errores
  if ($photo["profile_pic"]["error"] != UPLOAD_ERR_OK) {
    $errors .= $erros_file[$photo["profile_pic"]["error"]];
  }

  // verifico si hay errores y se hizo la peticion POST
  if ($errors != "") {
    setcookie('error', $errors, time() + 5);
    //redirect to index
    Redirect();
  }

}

/**
 * @param $user
 * @param $photo
 */
function insertInJson($user, $photo) {

  global $errors;

  // Nombre del archivo a abrir
  $file = "json/users.json";

  //extraigo el contenido y cierro el archivo
  $db = file_get_contents($file);

  //convierto el contendido del json en array
  $data = json_decode($db, true);

  // guardo la foto con la funcion savePhoto
  // esta funcion retornará una string con el nombre de la foto guardada
  // o un array con una clave error y su valor un mensaje del error ocurrido
  $pathPhoto = savePhoto($photo, $user['useremail']);

  // Verifico si la variable $pathPhoto es un array, si es así, es porque ocurrió un error
  // al guradar la imagen
  if (is_array($pathPhoto))
    // set la variable global error
    $errors = $pathPhoto["error"];

  // antes de definir la data, verificamos que los claves sean iguales
  if (md5($user['password']) != md5($user['equal_pass']))
    // set la variable global error
    $errors = 'Las claves no coinciden, intente de nuevo';

  // antes de definir la data, verificamos el email ya existe
  if (array_key_exists($user['useremail'], $data))
    // set la variable global error
    $errors = 'Ya existe un usuario con este email';

  // verifico si hay errores y se hizo la peticion POST
  if ($errors != "") {
    setcookie('error', $errors, time() + 5);
    //redirect to index
    Redirect();
  }

  // se crea un array con los dato a guardar en el json
  $new_user = [
    "name"        => $user['name'],
    "lastname"    => $user['lastname'],
    "birthDay"    => $user['birthDay'],
    "birthMonth"  => $user['birthMonth'],
    "birthYear"   => $user['birthYear'],
    "telefono"    => $user['telefono'],
    "interes"     => $user['interes'],
    "sexo"        => $user['sexo'],
    "localidad"   => $user['localidad'],
    "password"    => md5($user['password']),
    "photo"       => $pathPhoto
  ];

  // agreso al usuario nuevo al array definiendo como clave el email
  $data[$user['useremail']] = $new_user;

  // convierto el array en string para poder guardarlo en en archivo
  $data = json_encode($data);

  // inserto el contenido del array y cierro el archivo
  file_put_contents($file, $data);

  setcookie('success', 'Usuario registrado con exíto!', time() + 5);
  // regreso al form
  Redirect("signup-delete_coockies-trufa.php");
}

/**
 * @param $photo
 * @param $name
 * @return array|string
 */
function savePhoto($photo) {

  // se incluye al array declarado globalmente
  global $erros_file;

  if ($photo["profile_pic"]["error"] == UPLOAD_ERR_OK) {

    // Capturo el nombre
    $name = $photo["profile_pic"]["name"];

    // Capturo el archivo que se almacena en una carpeta temporal
    $picture = $photo["profile_pic"]["tmp_name"];

    // Obtenemos la extensión del archivo
    $ext = pathinfo($name, PATHINFO_EXTENSION);

    if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
      $today = new DateTime("now");
      $name_pic = date_format($today, "YmdHis")."_photo.";

      // Defino la ruta y el nombre con el cual se guradará la foto
      $path_and_name = dirname(__FILE__) . "/profile-pic/". $name_pic . $ext;

      // Guardamos la imagen
      move_uploaded_file($picture, $path_and_name);

      // retormo el nombre de la imagen con la que fue guardada
      return $name_pic . $ext;

    } else {
      return [
        'error' => 'El tipo de archivo para la foto de perfil no es valido (jpg, jpeg, png)'
      ];
    }
  } else {
    return [
      'error' => $erros_file[$photo["profile_pic"]["error"]]
    ];
  }

}

/**
 * @param string $url
 * @param bool $permanent
 */
function Redirect($url = 'signup-trufa.php', $permanent = false) {
  header('Location: ' . $url, true, $permanent ? 301 : 302);
  exit();
}

function RedirectSuccess($url = 'profile.php', $permanent = false) {
  header('Location: ' . $url, true, $permanent ? 301 : 302);
  exit();
}

/**
 * @param $data
 */
function dump($data) {
  echo "<pre>";
  var_dump($data);
  echo "<br>";
  print_r($data);
  echo "</pre>";
}

?>
