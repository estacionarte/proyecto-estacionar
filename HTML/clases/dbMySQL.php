<?php

require_once("db.php");
require_once("usuario.php");

class DBMySql extends DB {
  private $conn;

  public function __construct(){
    $dsn = "mysql:host=localhost;port=3306;dbname=estacionapp;charset=utf8mb4";
    $user = "root";
    $pass = "root";

    $this->conn = new PDO($dsn, $user, $pass);
  }


  public function traerPorEmail($email) {
    $sql = "Select * from users where email = :email";

    $query = $this->conn->prepare($sql);

    $query->bindValue(":email", $email);

    $query->execute();

    $array = $query->fetch(PDO::FETCH_ASSOC);

    if (!$array) {
      return NULL;
    }
    return new Usuario($array["firstName"], $array["lastName"], $array["birthDate"], $array["email"], $array["password"],$array["id"]);
  }

  public function traerTodosLosUsuarios() {
    $sql = "Select * from users";

    $query = $this->conn->prepare($sql);

    $query->execute();

    $arrayDeArrays = $query->fetchAll(PDO::FETCH_ASSOC);

    $arrayDeObjetos = [];

    foreach ($arrayDeArrays as $array) {
      $arrayDeObjetos[] = new Usuario($array["id"], $array["firstName"], $array["lastName"], $array["birthDate"], $array["email"], $array["password"]);
    }
    return $arrayDeObjetos;
  }

  public function guardarUsuario(Usuario $usuario) {
    $sql = "Insert into users values(default, :firstName, :lastName, :birthDate, :email, :password)";

    $query = $this->conn->prepare($sql);

    $query->bindValue(":firstName",$usuario->getFirstName());
    $query->bindValue(":lastName",$usuario->getLastName());
    $query->bindValue(":birthDate",$usuario->getBirthDate());
    $query->bindValue(":email",$usuario->getEmail());
    $query->bindValue(":password",$usuario->getPassword());

    $query->execute();

    $usuario->setId($this->conn->lastInsertId());

    return $usuario;
  }

  public function buscarUsuarios($buscar) {

    $sql = "Select * from users where firstName like :buscar OR email like :buscar";

    $query = $this->conn->prepare($sql);

    $query->bindValue(":buscar", "%$buscar%");

    $query->execute();

    $arrayDeArrays = $query->fetchAll(PDO::FETCH_ASSOC);

    $arrayDeObjetos = [];

    foreach ($arrayDeArrays as $array) {
      $arrayDeObjetos[] = new Usuario($array["id"], $array["firstName"], $array["lastName"], $array["birthDate"], $array["email"], $array["password"]);
    }
    return $arrayDeObjetos;
  }

  public function editarUsuario(Usuario $usuario) {
    $sql = "UPDATE users set firstName = :firstName, lastName = :lastName, birthDate = :birthDate, email = :email, password = :password WHERE id = :id";

    $query = $this->conn->prepare($sql);

    $query->bindValue(":firstName",$usuario->getFirstName());
    $query->bindValue(":lastName",$usuario->getLastName());
    $query->bindValue(":birthDate",$usuario->getBirthDate());
    $query->bindValue(":email",$usuario->getEmail());
    $query->bindValue(":password",$usuario->getPassword());
    $query->bindValue(":id",$usuario->getId());

    $query->execute();
  }
}

?>
