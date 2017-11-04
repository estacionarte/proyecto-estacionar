<?php

require_once("db.php");
require_once("usuario.php");

class DBJSON extends DB {
  private $arch;

  public function __construct(){
    $this->arch = "json/registeredUsers.json";
  }

  public function getArch(){
    return $this->arch;
  }

  public function setArch($arch){
    $this->arch = $arch;
  }

  public function json2array() {

    $url = $this->getArch();
    $json = file_get_contents($url);
    if ($json) {
      return json_decode($json, TRUE);
    } else {
      return FALSE;
    }

  }

  public function traerPorEmail($email){

    $archivo = fopen($this->arch, "r");

		$linea = fgets($archivo);

		while($linea != false) {

			$array = json_decode($linea, true);

			if ($array["email"] == $email) {
				return new Usuario($array["firstName"], $array["lastName"], $array["birthDate"], $array["email"], $array["password"], $array["id"]);
			}
			$linea = fgets($archivo);
		}

		return null;

  }

  public function traerTodosLosUsuarios(){
    $archivo = fopen($this->arch, "r");

    $linea = fgets($archivo);

    $usuarios = [];

    while($linea != false) {

      $array = json_decode($linea, true);
      $usuarios[] = new Usuario($array["firstName"], $array["lastName"], $array["birthDate"], $array["email"], $array["password"], $array["id"]);

      $linea = fgets($archivo);
    }

    return $usuarios;
  }

  public function traerNuevoId() {
    $usuarios = $this->traerTodosLosUsuarios();

    if (count($usuarios) == 0) {
      return 1;
    }

    $ultimo = array_pop($usuarios);

    return $ultimo->getId() + 1;
  }

  public function guardarUsuario(Usuario $usuario) {
    if ($usuario->getId() == null) {
      $usuario->setId($this->traerNuevoId());
    }

    $json = json_encode($usuario->toArray());
    file_put_contents($this->arch, $json . PHP_EOL, FILE_APPEND);
  }

}

?>
