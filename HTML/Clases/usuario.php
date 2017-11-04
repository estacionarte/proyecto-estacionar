<?php
// - ID - EMAIL - PASS - USERNAME
// + GETMAIL + SETMAIL
class Usuario {
  private $id;
  private $firstName;
  private $lastName;
  private $birthDate;
  private $email;
  private $password;

  public function __construct($firstName, $lastName, $birthDate, $email, $password, $id = null){
    $id == null ? $this->password = password_hash($password, PASSWORD_DEFAULT) : $this->password = $password;

    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->birthDate = $birthDate;
    $this->email = $email;
    $this->id = $id;
  }

  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getFirstName(){
    return $this->firstName;
  }

  public function setFirstName($firstName){
    $this->firstName = $firstName;
  }

  public function getLastName(){
    return $this->lastName;
  }

  public function setLastName($lastName){
    $this->lastName = $lastName;
  }

  public function getBirthDate(){
    return $this->birthDate;
  }

  public function setBirthDate($birthDate){
    $this->birthDate = $birthDate;
  }

  public function getEmail(){
    return $this->email;
  }

  public function setEmail($email){
    $this->email = $email;
  }

  public function getPassword(){
    return $this->password;
  }

  public function setPassword($password){
    $this->password = $password;
  }

  public function toArray() {
    return [
      "id" => $this->id,
      "firstName" => $this->firstName,
      "lastName" => $this->lastName,
      "birthDate" => $this->birthDate,
      "email" => $this->email,
      "password" => $this->password
    ];
  }

  public function setNewPassword($password) {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }
}

?>
