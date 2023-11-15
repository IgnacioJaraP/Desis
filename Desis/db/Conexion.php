<?php
class Conectar{
    public static function conexion(){
        $conexion = new mysqli("localhost", "user", "password", "database_name");
        return $conexion;
    }
}

?>