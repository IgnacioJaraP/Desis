<?php

class Votaciones{

    private $db;
    private $regiones;
    private $comunas;
    private $candidatos;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->regiones = array();
        $this->comunas = array();
        $this->candidatos = array();
    }

    public function get_regiones(){
        $query = $this->db->query("select * from region");
        while($filas = $query->fetch_assoc()){
            $this->regiones[] = $filas;
        }
        return $this->regiones;
    }

    public function get_candidatos(){
        $query = $this->db->query("select * from candidato");
        while($filas = $query->fetch_assoc()){
            $this->candidatos[] = $filas;
        }
        return $this->candidatos;
    }

    public function get_comunas($region){
        $query = $this->db->query("select * from comuna where region = $region");
        while($filas = $query->fetch_assoc()){
            $this->comunas[] = $filas;
        }
        return $this->comunas;
    }

    public function votar($nombre, $alias, $rut, $email, $region, $comuna, $candidato, $web, $tv, $sociales, $amigo){
        $this->db->query("insert into voto(nombre, alias, rut, email, region, comuna, candidato, web, tv, social, amigo) values('$nombre', '$alias', '$rut', '$email', '$region', '$comuna', '$candidato', '$web', '$tv', '$sociales', '$amigo')");
    }

}

?>