<?php
    require_once dirname(__FILE__)."/../db/Conexion.php";
    include dirname(__FILE__).'/../models/Votaciones.php';

    $nombre = $_POST["nombre"];
    $alias = $_POST["alias"];
    $rut = $_POST["rut"];
    $email = $_POST["email"];
    $region = $_POST["region"];
    $comuna = $_POST["comuna"];
    $candidato = $_POST["candidato"];
    $web = $_POST["web"];
    $tv = $_POST["tv"];
    $sociales = $_POST["sociales"];
    $amigo = $_POST["amigo"];

    $votaciones = new Votaciones;
    $votaciones->votar($nombre, $alias, $rut, $email, $region, $comuna, $candidato, $web, $tv, $sociales, $amigo);

?>