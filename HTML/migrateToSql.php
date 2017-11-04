<!DOCTYPE html>
<?php
require_once('functions.php');

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
      $sql = 'CREATE TABLE users ( ID int(10) unsigned NOT NULL AUTO_INCREMENT, FirstName varchar(100) NOT NULL, LastName varchar(100) NOT NULL, Birthday varchar(100) NOT NULL, Email varchar(100) NOT NULL, Password varchar(100) NOT NULL, PRIMARY KEY (ID)) ENGINE=InnoDB DEFAULT CHARSET=latin1';
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
    if ($connection->query('use estacionApp')) {
      if ($result = $connection->query('select count(*) from users')) {
        $rows = $result->fetch();
        $rows = ($rows) ? $rows[0] : 0;
        if ($rows) {
          return 'tableWithData';
        } else {
          return 'emptyTable';
        }
      } else {
        return 'tableNotFound';
      }
    } else {
        return 'dbNotFound';
    }

  } else {
    return 'conectionFailed';
  }
}

function jsonToTable ($db) {
  if (!$db) return;

  $users = json2array('registeredUsers.json');

  if ($users) {
    $connection = mysqlConnection();
    if ($connection) $connection->query('use '.$db);
  }

  $connection->exec('DELETE FROM users');

  $sql = 'INSERT INTO users (';
  $sql .= 'ID, FirstName, LastName, Birthday, Email, Password) VALUES (';
  $sql .= ':id, :firstname, :lastname, :birthday, :email, :password)';

  $stmt = $connection->prepare($sql);

  foreach ($users as $user) {

    $firstName = '';
    $lastName = '';
    $day = '';
    $month = '';
    $year = '';
    $email = '';
    $password = '';

    foreach ($user as $key => $value) {
      $key = strtoupper($key);
      switch ($key) {
        case 'ID':
          $id = $value;
          break;

        case 'FIRSTNAME':
          $firstName = $value;
          break;

        case 'LASTNAME':
          $lastName = $value;
          break;

        case 'BIRTHDAY':
          $day = $value;
          break;

        case 'BIRTHMONTH':
          $month = $value;
          break;

        case 'BIRTHYEAR':
          $year = $value;
          break;

        case 'EMAIL':
          $email = $value;
          break;

        case 'PASSWORD':
          $password = $value;
          break;

        default:
          # code...
          break;
      }
    }
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':firstname', $firstName, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $lastName, PDO::PARAM_STR);

    $birthday = $year . '-' . $month . '-' . $day;
    $stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);

    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
  }
  $connection = null;

}

if ($_POST) {
  foreach ($_POST as $key => $value) {
    switch ($key) {
      case 'db':
        createDataBase('estacionApp');
        break;

      case 'table':
        createTable('estacionApp');
        break;

      case 'data':
        jsonToTable('estacionApp');
        break;

      default:
        break;
    }
  }
}

$status = getDataBaseStatus();
echo 'Status: ' . $status;
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>json 2 sql</title>
  </head>
  <body>
    <br>
    <br>
    <form class="" action="" method="post">
      <input type="submit" name="db" value="Crear Base de Datos">
    </form>
    <br>
    <form class="" action="" method="post">
      <input type="submit" name="table" value="Crear Tabla"
      <?php
      if ($status == 'dbNotFound') {
        echo "disabled";
      }
      ?>>
    </form>
    <br>
    <form class="" action="" method="post">
      <input type="submit" name="data" value="Insertar datos en la tabla"

      <?php
      if ($status !== 'emptyTable' && $status !== 'tableWithData') {
        echo "disabled";
      }
      ?>>
    </form>
  </body>
</html>
