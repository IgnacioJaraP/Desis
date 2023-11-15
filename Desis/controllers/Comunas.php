<?php
    require_once dirname(__FILE__)."/../db/Conexion.php";
    include dirname(__FILE__).'/../models/Votaciones.php';

    $region = $_POST["region"];
    $votaciones = new Votaciones;
    $comunas = $votaciones->get_comunas($region);

    echo json_encode($comunas);

?>