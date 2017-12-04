<?php

$file = file_get_contents("http://bawifree.hol.es/json/data.json");
$json = json_decode($file);
$hotspots = $json->result->records;

$db = new PDO('mysql:host=localhost;dbname=estacionapp', 'root','root');

foreach ($hotspots as $hotspot) {
  // $statement = $db->prepare($sql_insert);
  // "VALUES (NULL, NULL, NULL, GeomFromText('POINT(:lat :lon)'))";
  // $statement->bindParam() me da error por los valores negativos

  $sql_insert = "INSERT INTO `locations` " .
                "(`id`, `created_at`, `updated_at`, `location`, `domicilio`, `barrio` ) " .

                "VALUES (NULL, NULL, NULL, GeomFromText('POINT(".$hotspot->lat." ".$hotspot->lon.")'), '".
                $hotspot->domicilio . "', '" .
                $hotspot->barrio .    "' )";

  $db->query($sql_insert);

  // $statement->bindParam(':lat', $hotspot->lat);
  // $statement->bindParam(':lon', $hotspot->lon);
  //
  // $statement->execute();
  //
  // echo $statement->errorCode();
  // echo '<br>';
  // echo $statement->debugDumpParams();
  // echo '<br>';
}
