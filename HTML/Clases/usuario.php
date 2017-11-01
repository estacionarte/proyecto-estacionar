<?php
// - ID - EMAIL - PASS - USERNAME
// + GETMAIL + SETMAIL
class Usuario {
  private $id;
  private $firstName;
  private $lastName;
  private $birthday;
  private $email;
  private $password;

  public function __construct($firstName, $lastName, $birthday, $email, $password, $id = null){
    $id == null ? $this->password = password_hash($password, PASSWORD_DEFAULT) : $this->password = $password;

    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->birthday = $birthday;
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
    return $this->name;
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

  public function getBirthday(){
    return $this->birthday;
  }

  public function setBirthday($birthday){
    $this->birthday = $birthday;
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
      "id"        => $this->id,
      "firstName" => $this->firstName,
      "lastName"  => $this->lastName,
      "birthday"  => $this->birthday,
      "email"     => $this->email,
      "password"  => $this->password
    ];
  }

  public function setNewPassword($password) {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }
}

?>
