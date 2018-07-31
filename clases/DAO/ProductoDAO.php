<?php
require_once(Link::include_file('clases/BDconn.php'));
require_once(Link::include_file('clases/DBO/Producto.php'));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class ProductoDAO extends BDconn{
    
      
    public function __construct() {
        parent::__construct();
    }
    
    public function getPantallaOfertas() {
        $sql = "SELECT 
                    p.id,
                    p.nombre,
                    p.alcance,
                    p.ruta_imagen,
                    p.monto,
                    p.descripcion,
                    o.porcentaje,
                    o.fecha_fin
                FROM 
                    producto as p
                    LEFT JOIN oferta as o ON o.prod_id = p.id AND o.activo = TRUE  AND o.fecha_fin >= NOW()
                WHERE 
                    p.activo = TRUE;";
        $q = $this->pdo->query($sql);
        $result = array();
        if($q != FALSE && !empty($q)){
            while($res = $q->fetch(PDO::FETCH_ASSOC)){
                $producto = new Producto();
                $producto->setId($res["id"]);
                $producto->setNombre($res["nombre"]);
                $producto->setAlcance($res["alcance"]);
                $producto->setRuta_imagen($res["ruta_imagen"]);
                $producto->setMonto($res["monto"]);
                $producto->setDescripcion($res["descripcion"]);
                if($res["porcentaje"] != null){
                    $dateTimeFin =  date_create_from_format($res["fecha_fin"],"Y-m-d");
                    $dateTimeActual = date();
                    if($dateTimeFin >= $dateTimeActual){
                        $porcentaje = $res["porcentaje"];
                        $montoOferta = ($producto->getMonto() - (($producto->getMonto() * $porcentaje) / 100));
                        $producto->setMontoOferta($montoOferta);
                        $producto->setPorcentajeOferta($res["porcentaje"]);
                    }
                }

                $result[] = $producto;
            }
        }
        return $result;
    }

    /**
     * 
     * @param type $id
     * @return Producto
     * @throws Exception
     */
    public function getProductoById($id) {
        try {
            $consulta = $this->pdo->prepare("SELECT 
                        p.id,
                        p.nombre,
                        p.alcance,
                        p.ruta_imagen,
                        p.monto,
                        p.descripcion,
                        o.porcentaje,
                        o.fecha_fin
                    FROM 
                        producto as p
                        LEFT JOIN oferta as o ON o.prod_id = p.id AND o.activo = TRUE 
                    WHERE 
                        p.id = :id AND  
                        p.activo = TRUE;");
            $respuesta = $consulta->execute(array(
                "id" => $id
            ));
//            printArray($consulta->errorInfo());
            if(!$respuesta)
                throw new Exception("Datos no encontrados", Errores::ERROR_NOT_FOUND);
            
            $res = $consulta->fetch(PDO::FETCH_ASSOC);
//            printArray($res);
            $producto = new Producto();
            $producto->setId($res["id"]);
            $producto->setNombre($res["nombre"]);
            $producto->setAlcance($res["alcance"]);
            $producto->setRuta_imagen($res["ruta_imagen"]);
            $producto->setMonto($res["monto"]);
            $producto->setDescripcion($res["descripcion"]);
            if($res["porcentaje"] != null){
                $dateTimeFin = new DateTime($res["fecha_fin"]);
                $dateTimeActual = new DateTime();
                if($dateTimeFin >= $dateTimeActual){
                    $porcentaje = $res["porcentaje"];
                    $montoOferta = ($producto->getMonto() - (($producto->getMonto() * $porcentaje) / 100));
                    $producto->setMontoOferta($montoOferta);
                    $producto->setPorcentajeOferta($res["porcentaje"]);
                }
            }
//            printArray($producto);
            return $producto;
                    
        } catch(PDOException $exc){
            
        }catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
