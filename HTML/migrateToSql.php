<!DOCTYPE html>
<?php
require_once('functions.php');
require_once('clases/dbJSON.php');

function mysqlConnection() {

  try {
    $connection = new PDO('mysql:host=localhost', "root", "root");
  } catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
  }

  return $connection;
}

function createDataBase($db) {
  $connection = mysqlConnection();
  if ($connection) {
    $connection->exec('DROP DATABASE '. $db);
    $connection->exec('CREATE DATABASE '. $db);
  }
  $connection = null;
}

function createTable($db) {

  if (!$db) return;

  $connection = mysqlConnection();

  if ($connection) {
    try {
      $sql = 'use ' . $db;
      $connection->exec($sql);
      $sql = 'DROP TABLE users';
      $connection->exec($sql);
      $sql = 'CREATE TABLE users ( id int(10) unsigned NOT NULL AUTO_INCREMENT, firstName varchar(100) NOT NULL, lastName varchar(100) NOT NULL, birthDate varchar(100) NOT NULL, email varchar(100) NOT NULL, password varchar(100) NOT NULL, PRIMARY KEY (ID)) ENGINE=InnoDB DEFAULT CHARSET=latin1';
      $connection->exec($sql);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  $connection = null;
}

function getDataBaseStatus() {
  $connection = mysqlConnection();

  if ($connection) {
    if ($connection->query('use Estacionapp')) {
      if ($result = $connection->query('select count(*) from users')) {
        $rows = $result->fetch();
        $rows = ($rows) ? $rows[0] : 0;
        if ($rows) {
          return 'La Tabla tiene los usuarios cargados';
        } else {
          return 'La Tabla esta vacía';
        }
      } else {
        return 'No hay Tablas cargadas';
      }
    } else {
        return 'No se encontró la Base de Datos';
    }

  } else {
    return 'Falló la conexión';
  }
}

function jsonToTable ($db) {
  if (!$db) return;

  // $users = json2array('registeredUsers.json');
  $json = new DBJSON();
  $users = $json->traerTodosLosUsuarios();

  if ($users) {
    $connection = mysqlConnection();
    if ($connection) $connection->query('use '.$db);
  }

  $connection->exec('DELETE FROM users');

  $sql = 'INSERT INTO users (';
  $sql .= 'id, firstName, lastName, birthDate, email, password) VALUES (';
  $sql .= ':id, :firstname, :lastname, :birthday, :email, :password)';

  $stmt = $connection->prepare($sql);

  foreach ($users as $user) {
    $stmt->bindValue(':id', $user->getId(), PDO::PARAM_INT);
    $stmt->bindValue(':firstname', $user->getFirstName(), PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $user->getLastName(), PDO::PARAM_STR);
    $stmt->bindValue(':birthday', $user->getBirthDate(), PDO::PARAM_STR);
    $stmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
    $stmt->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
    $stmt->execute();
  }
  $connection = null;
}

if ($_POST) {
  foreach ($_POST as $key => $value) {
    switch ($key) {
      case 'db':
        createDataBase('Estacionapp');
        break;

      case 'table':
        createTable('Estacionapp');
        break;

      case 'data':
        jsonToTable('Estacionapp');
        break;

      default:
        break;
    }
  }
}

?>
