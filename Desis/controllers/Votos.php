<?php

    require_once dirname(__FILE__)."/../db/Conexion.php";

    include dirname(__FILE__).'/../models/Votaciones.php';
    $votaciones = new Votaciones;
    $regiones = $votaciones->get_regiones();
    $candidatos = $votaciones->get_candidatos();

    require_once dirname(__FILE__)."/../views/Elecciones.php";
?>