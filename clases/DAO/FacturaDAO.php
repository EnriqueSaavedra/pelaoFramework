<?php

require_once(Link::include_file('clases/BDconn.php'));
require_once(Link::include_file('clases/DBO/Factura.php'));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacturaDAO
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class FacturaDAO extends BDconn{
    
      
    public function __construct() {
        parent::__construct();
    }
    
    public function getPdo(){
        return $this->pdo;
    }

    public function actualizarFactura(PDO $pdo, Factura $factura) {
        $sm = new SQLManager($pdo, "factura", array("id"), $factura);
        $sql = $sm->getUpdate();
        $result = $pdo->exec($sql);
        if(!$result)
            throw new Exception("No se pudo crear factura", Errores::ERROR_QUERY);
        return true;
    }
    
    public function createFactura(Factura $factura) {
        $sm = new SQLManager($this->pdo, "factura", array("id"), $factura);
        $sql = $sm->getInsert();
        $result = $this->pdo->exec($sql);
        if(!$result)
            throw new Exception("No se pudo crear elemento", Errores::ERROR_QUERY);
        return true;
    }
    
    /**
     * 
     * @param type $token
     * @return Factura
     */
    public function getFacturaByToken($tokenTbk) {
        $consulta = $this->pdo->prepare("SELECT * from factura WHERE token_tbk = :token_tbk ;");
        $respuesta = $consulta->execute(array(
            "token_tbk" => $tokenTbk
        ));
        if(!$respuesta)
            return null;
        return $consulta->fetchObject("Factura");
    }
    
    public function getRegionNombre($region){
        $consulta = $this->pdo->prepare("SELECT nombre from region WHERE id = :id ;");
        $respuesta = $consulta->execute(array(
            "id" => $region
        ));
        if(!$respuesta)
            return null;

        return $consulta->fetchColumn();
    }
    public function getProvinciaNombre($provincia){
        $consulta = $this->pdo->prepare("SELECT nombre from provincia WHERE id = :id ;");
        $respuesta = $consulta->execute(array(
            "id" => $provincia
        ));
        if(!$respuesta)
            return null;

        return $consulta->fetchColumn();
    }
    public function getComunaNombre($comuna){
        $consulta = $this->pdo->prepare("SELECT nombre from comuna WHERE id = :id ;");
        $respuesta = $consulta->execute(array(
            "id" => $comuna
        ));
        if(!$respuesta)
            return null;

        return $consulta->fetchColumn();
    }
    
    public function getHistorialFacturas($userId){
        $consulta = $this->pdo->prepare("SELECT * from factura WHERE (estado=4 OR estado=3) AND id_usuario =:id_usuario ORDER BY fecha_creacion DESC;");
        $respuesta = $consulta->execute(array(
            "id_usuario" => $userId
        ));
        if(!$respuesta)
            return null;
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Factura");
    }
    
    public function eliminarFacturaByTokenTBK($tokenTbk) {
        $consulta = $this->pdo->prepare("DELETE from factura WHERE token_tbk=:token_tbk;");
        $respuesta = $consulta->execute(array(
            "token_tbk" => $tokenTbk
        ));
        if(!$respuesta)
            return false;
        return true;
    }
    
    public function eliminarFacturaByOrdenCompra($ordenCompra) {
        $consulta = $this->pdo->prepare("DELETE from factura WHERE orden_compra=:orden;");
        $respuesta = $consulta->execute(array(
            "orden" => $ordenCompra
        ));
        if(!$respuesta)
            return false;
        return true;
    }
    //put your code here
}
