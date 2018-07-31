<?php

require_once(Link::include_file('clases/BDconn.php'));
require_once(Link::include_file('clases/DBO/Geo.php'));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GeoDAO
 *
 * @author enriq
 */
class GeoDAO  extends BDconn{
      
    public function __construct() {
        parent::__construct();
    }
    
    public function getRegiones(){
        $consulta = $this->pdo->prepare("SELECT * from region;");
        $respuesta = $consulta->execute();
        if(!$respuesta)
            return null;
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Region");
    }
    
    public function getProvinciaByRegion($idRegion) {
        if($idRegion == "0"){
            return $this->getAllProvincia();
        }
         $consulta = $this->pdo->prepare("SELECT * from provincia WHERE id_region = :idRegion;");
         $respuesta = $consulta->execute(array(
             "idRegion" => $idRegion
         ));
         if(!$respuesta)
             return null;
         return $consulta->fetchAll(PDO::FETCH_CLASS,"Provincia");
    }
    
    public function getAllProvincia(){
        $consulta = $this->pdo->prepare("SELECT * from provincia;");
        $respuesta = $consulta->execute();
        if(!$respuesta)
            return null;
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Provincia");
    }


    public function getComunaByProvincia($idProvincia){
        if($idProvincia == "0"){
            return $this->getAllComuna();
        }
         $consulta = $this->pdo->prepare("SELECT * from comuna WHERE id_provincia = :idProvincia;");
         $respuesta = $consulta->execute(array(
             "idProvincia" => $idProvincia
         ));
         if(!$respuesta)
             return null;
         return $consulta->fetchAll(PDO::FETCH_CLASS,"Comuna");
    }
    
    public function getAllComuna() {
        $consulta = $this->pdo->prepare("SELECT * from comuna;");
        $respuesta = $consulta->execute();
        if(!$respuesta)
            return null;
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Comuna");
    }

    //put your code here
}
