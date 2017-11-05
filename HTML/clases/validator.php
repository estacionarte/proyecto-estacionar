<?php
// +VALIDAR LOGIN + VALIDAR REGISTRO
class Validator {

  public function validarLogin(DB $db){
    $error = [];

    if ($_POST['email'] == '') {
      $error['type'] = 3;
      $error['desc'] = "Ingresar datos";
    }
    // Chequeo si el mail es correcto
    elseif ($db->traerPorEmail($_POST["email"]) == null) {
      $error['type'] = 1;
      $error['desc'] = "El usuario no existe";
    } else {
      // Chequeo si la contraseña es la correcta
      $usuario = $db->traerPorEmail($_POST["email"]);

      if (!password_verify($_POST["password"], $usuario->getPassword())) {
        $error['type'] = 2;
        $error['desc'] = "Contraseña incorrecta";
      } else {
        $error['type'] = 0;
        $error['desc'] = "Datos OK";
      }
    }
    return $error;
  }

  public function validarDatosSignUp(db $db){

    $errors = [];

    // Recorro form chequeando si los campos están vacíos o no
    foreach ($_POST as $key_post => $value_post) {
      if(empty($_POST[$key_post])){
        // Creo cookie de campos vacío
        $errors["vacio"] = "Completar campos vacíos.";
        // setcookie("camposVacios", "TRUE", time() + 2);
        setcookie("EMPTY" . $key_post, "border: solid 2px red", time() + 2);
      } elseif ($key_post != 'password')
        // Creo cookie para persistencia
        setcookie($key_post, $_POST[$key_post], time() + 2);
    }

    // Verifico si el e-mail ya existe
    if ($db->traerPorEmail($_POST["email"]) != null) {
      setcookie("EMPTYemail", "border: solid 2px red", time() + 2);
      global $errors;
      $errors["email"] = 'Ya existe un usuario registrado con este e-mail.';
    }

    // Verifico que las claves ingresadas sean iguales
    if ($_POST['password'] != $_POST['confirmar-password']) {
      setcookie("EMPTYpassword", "border: solid 2px red", time() + 2);
      setcookie("EMPTYconfirmar-password", "border: solid 2px red", time() + 2);
      global $errors;
      $errors['password'] = 'Las claves no coinciden.';
    }

    // Si hay errores creo una cookie
    if (count($errors) > 0) {
      $print = '';
      foreach ($errors as $error) {
        $print .= $error;
      }
      setcookie('error', $print, time() + 5);
    }

    return $errors;
  }

  public function validarProfilePic(){

    $errors = [];

    // Array global de mensajes de errores en la carga de fotos
    $errors_file = [
      1 => 'La foto de perfil subida excede el tamaño máximo',
      2 => 'La foto de perfil subida excede el tamaño permitido', // Según lo definido en el front
      3 => 'No se pudo completar la carga de la foto de perfil. Intente nuevamente.', // El archivó se subió parcialmente
      4 => 'La foto de perfil es requerida', // No se subió ningún archivo
      6 => 'Falta la carpeta temporal',
      7 => 'No se pudo escribir el fichero en el disco. Verificar perimsos',
      8 => 'Otra aplicación ha detenido la subida de la foto, verificar configuracion del server.'
    ];

    // Valido si la foto tiene errores
    if ($_FILES["profilePic"]["error"] != UPLOAD_ERR_OK) {
      setcookie("EMPTYprofilePic", "border: solid 2px red", time() + 5);
      global $errors_file;
      $errors["profilePic"] = $errors_file[$_FILES["profilePic"]["error"]];
    } else {
      // Obtengo la extensión del archivo
      $nombre = $_FILES["profilePic"]["name"];
      $ext = pathinfo($nombre, PATHINFO_EXTENSION);
      // Chequeo si es una de las extensiones que acepto
      if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") {
        setcookie("EMPTYprofilePic", "border: solid 2px red", time() + 5);
        $errors["profilePic"] = 'El tipo de imagen para la foto de perfil debe ser .jpg, .jpeg o .png.';
      }
    }

    // Le agrego los errores a la cookie que después los imprime y devuelvo el resultado
    if (count($errors) > 0){
      setcookie('errorProfilePic', $errors['profilePic'], time() + 2);
    }

    return $errors;
  }








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

}

?>
