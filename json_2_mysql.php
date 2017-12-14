<?php

$file = file_get_contents("http://bawifree.hol.es/json/data.json");
$json = json_decode($file);
$hotspots = $json->result->records;

$db = new PDO('mysql:host=localhost;dbname=estacionapp', 'root','root');

foreach ($hotspots as $hotspot) {

  // $sql_insert = "INSERT INTO `locations` " .
  $sql_insert = "INSERT INTO `espacios` " .
                // "(`id`, `created_at`, `updated_at`, `location`, `domicilio`, `barrio` ) " .
                "(`id`, `idUser`, `created_at`, `updated_at`, `location`, `direccion`, `tipoEspacio` ) " .

                "VALUES (NULL, 1, NULL, NULL, GeomFromText('POINT(".$hotspot->lat." ".$hotspot->lon.")'), '".
                $hotspot->domicilio . "', 'Cochera Privada' )";
                // $hotspot->barrio .    "' )";

  $db->query($sql_insert);
}
