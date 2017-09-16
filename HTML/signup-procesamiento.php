<?php

  function signUpUser(){
    // Abro el archivo donde guardo los registros
    $file = "json/registeredUsers.json";
    $extract = file_get_contents($file);
    $data = json_decode($extract, true);

    // Defino ID para el nuevo user
    $id = count($data);
    $id += 1;

    // Encripto la contraseña
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    // Guardo los datos recibidos del formulario en una nueva variable
    $newUser = [
      "id" => $id,
      "firstName" => $_POST['firstName'],
      "lastName" => $_POST['lastName'],
      "birthDay" => $_POST['birthDay'],
      "birthMonth" => $_POST['birthMonth'],
      "birthYear" => $_POST['birthYear'],
      "sexo" => $_POST['sexo'],
      "localidad" => $_POST['localidad'],
      "email" => $_POST['email'],
      "telefono" => $_POST['telefono'],
      "password" => $password,
      "interes" => $_POST['interes']
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
    "sexo" => "",
    "localidad" => "",
    "email" => "",
    "telefono" => "",
    "password" => "",
    "interes" => ""
	];

  // Defino variable para detectar envío de POST
  $isReceived = false;

	// Defino un array para la persistencia de datos
	$values = [
    "firstName" => "",
		"lastName" => "",
		"birthDay" => "",
		"birthMonth" => "",
		"birthYear" => "",
    "sexo" => "",
    "localidad" => "",
    "email" => "",
    "telefono" => "",
    "password" => "",
    "interes" => ""
	];

	// Comienzo proceso si existe petición POST
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$isReceived = true;

    // Recorro form chequeando si los campos están vacíos o no
		foreach ($_POST as $key_post => $value_post) {
			if(empty($_POST[$key_post]))
				$emptyFields[$key_post] = "border: solid 2px red";
			else
				$values[$key_post] = $_POST[$key_post];
		}
	}

  $camposVacios = false;

  foreach ($emptyFields as $key => $value) {
    if ($value!="") {
      global $camposVacios;
      $camposVacios = true;
      // header('Location:signup.php');
    }
  }

	// Si se cumplen las condiciones completo el registro
	if (!$camposVacios && $isReceived) {
		signUpUser();
    header('Location:registerSuccess.php');
	}

?>
