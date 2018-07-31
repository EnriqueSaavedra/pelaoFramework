<?php

require_once(Link::include_file('clases/BDconn.php'));
require_once(Link::include_file('clases/DBO/Carrito.php'));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CarritoDAO
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class CarritoDAO extends BDconn{
    
    const CARRITO_SESSION = 'carrito';
    const TOKEN_CARRITO = 'token';  
      
    public function __construct() {
        parent::__construct();
    }
    
    public function setCarritoCookies($token) {
        $_SESSION[self::CARRITO_SESSION] = $token;
    }
    
    public function crearElementoCarrito($idUser,$idProd,$cantidad,$token){
        $date = new DateTime();
        $consulta = $this->pdo->prepare("INSERT INTO carrito (token,id_usuario,id_prod,cantidad,fecha)VALUES(:token,:idUser,:idProd,:cantidad,:fecha);");
        $resultado = $consulta->execute(array(
            "token" => $token,
            "idUser" => $idUser,
            "idProd" => $idProd,
            "cantidad" => $cantidad,
            "fecha" => $date->format('Y/m/d H:i:s')
        ));
        if(!$resultado)
            throw new Exception("No se pudo crear elemento", Errores::ERROR_TRANSMISION);
        return true;
    }
    
    public function getTokenCarritoUsuario($idUser) {
        $consulta = $this->pdo->prepare("SELECT token from carrito WHERE id_usuario = :id ;");
        $respuesta = $consulta->execute(array(
            "id" => $idUser
        ));
        if(!$respuesta)
            return null;
        return $consulta->fetchColumn();
    }
    
    public function removeElementCarrito($idUser,$idProd){
        $token = $this->getTokenCarritoUsuario($idUser);
        if(empty($token))
            throw new Exception("No se encuentra token", Errores::ERROR_TRANSMISION);
        $consulta = $this->pdo->prepare("DELETE FROM carrito WHERE id_prod = :prod AND token = :token");
        $res = $consulta->execute(array(
            "prod" => $idProd,
            "token" => $token
        ));
        if(!$res)
            throw new Exception("No se pudo actualizar cantdidad", Errores::ERROR_TRANSMISION);
        return $this->getTotalCarritos($token);
    }

    public function addElementCarrito($idUser,$idProd,$cantidad){
        $token = $this->getTokenCarritoUsuario($idUser);
        if(empty($token)){
            $token = $this->createCarrito($idUser, $idProd, $cantidad);
            $todosCarritos = $this->getCarritosByToken($token);
        }else{
            $carrito = $this->getElementoCarrito($idUser,$idProd);
            if(empty($carrito)){
                if($this->crearElementoCarrito($idUser, $idProd, $cantidad, $token))
                    $carrito = $this->getElementoCarrito ($idUser, $idProd);
            }else{
                $date = new DateTime();
                $total = $carrito->getCantidad() + $cantidad;
                $carrito->setCantidad($total);
                $consulta = $this->pdo->prepare("UPDATE carrito SET cantidad = :cantidad, fecha = :fecha WHERE id_prod = :prod AND token = :token");
                $res = $consulta->execute(array(
                    "cantidad" => $total,
                    "fecha" => $date->format('Y/m/d H:i:s'),
                    "prod" => $idProd,
                    "token" => $token
                ));
                if(!$res)
                    throw new Exception("No se pudo actualizar cantdidad", Errores::ERROR_TRANSMISION);
            }
            $token = $carrito->getToken();
            $todosCarritos = $this->getCarritosByToken($token);
            if(empty($todosCarritos))
                throw new Exception("No hay carritos", Errores::ERROR_NOT_FOUND);
        }
        $this->setCarritoCookies($token);
        return $token;
    }
    
    /**
     * 
     * @param type $idUser
     * @param type $idProd
     * @return Carrito
     */
    public function getElementoCarrito($idUser,$idProd) {
        $consulta = $this->pdo->prepare("SELECT * from carrito WHERE id_usuario = :user AND id_prod = :prod;");
        $res = $consulta->execute(array(
            "user" => $idUser,
            "prod" => $idProd
        ));

        if(!$res)
            return null;
        return $consulta->fetchObject("carrito");
    }
    
    /**
     * 
     * @param type $idUser
     * @return Carrito
     * @throws Exception
     */
    public function getCarritosByIdUser($idUser) {
        $consulta = $this->pdo->prepare("SELECT * from carrito WHERE id_usuario = :id;");
        $resultado = $consulta->execute(array(
            "id" => $idUser
        ));
        if(!$resultado)
            return null;

        return $consulta->fetchAll(PDO::FETCH_CLASS,"Carrito");
    }
    
    public function getCarritosByIdUserDetalle($idUser){
        require_once(Link::include_file('clases/DAO/ProductoDAO.php'));
        $consulta = $this->pdo->prepare("SELECT * from carrito WHERE id_usuario = :id;");
        $resultado = $consulta->execute(array(
            "id" => $idUser
        ));
        if(!$resultado)
            return null;

        $productoDao = new ProductoDAO();
        $res = $consulta->fetchAll(PDO::FETCH_CLASS,"Carrito");
        /*@var $value Carrito*/
        foreach ($res as $key => $value) {
            $value->setProducto($productoDao->getProductoById($value->getId_prod()));
        }
        return $res;
    }

    public function getPintadoCarritosByToken($token){
        $consulta = $this->pdo->prepare("SELECT * FROM carrito WHERE token = :token ;");
        $resultado = $consulta->execute(array(
            "token" => $token
        ));
        if(!$resultado){
            return null;
        }
        $productoDao = new ProductoDAO($this->file);


        $result = array();
        /*@var $res Carrito*/
        /*@var $producto Producto*/
        while($res = $consulta->fetchObject("Carrito")){
            $producto = $productoDao->getProductoById($res->getId_prod());
            $res->setProducto($producto);
            $result[] = $res;
        }
        return $result;
    }


    /**
     * 
     * @param type $token
     * @return Carrito
     * @throws Exception
     */
    public function getCarritosByToken($token) {
        $consulta = $this->pdo->prepare("SELECT * FROM carrito WHERE token = :token ;");
        $resultado = $consulta->execute(array(
            "token" => $token
        ));
        if(!$resultado)
            return null;
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Carrito");
    }
    
    public function createCarrito($idUser,$idProd,$cantidad) {
        $date = new DateTime();
        $token = md5($idUser.$date->format('y/m/d H:i:s'));
        $consulta = $this->pdo->prepare("INSERT INTO carrito (token,id_usuario,id_prod,cantidad,fecha)VALUES(:token,:idUser,:idProd,:cantidad,:fecha);");
        $resultado = $consulta->execute(array(
            "token" => $token,
            "idUser" => $idUser,
            "idProd" => $idProd,
            "cantidad" => $cantidad,
            "fecha" => $date->format('Y/m/d H:i:s')
        ));
        if(!$resultado)
            throw new Exception("No se pudo crear carrito", Errores::ERROR_TRANSMISION);

        return $token;
    }
    
    public function destroyCarritoByUserToken($token){
        $consulta = $this->pdo->prepare("DELETE FROM carrito WHERE token = :token;");
        $resultado = $consulta->execute(array(
            "token" => $token
        ));
        if(!$resultado)
            throw new Exception("No se pudo destruir carrito", Errores::ERROR_QUERY);
        return $resultado;
    }

    public function getTotalCarritos($token) {
        $consulta = $this->pdo->prepare("SELECT COUNT(1) from carrito WHERE token = :token ;");
        $respuesta = $consulta->execute(array(
            "token" => $token
        ));
        if(!$respuesta)
            return 0;
        return $consulta->fetchColumn();
    }
    
    public static function getResponseCode($responseCode){
        switch ($responseCode){
            case 0:
                return true;
                break;
            case -1;
                throw new Exception('Rechazo de transacción.', Errores::ERROR_TBK);
                break;
            case -2:
                throw new Exception('Transacción debe reintentarse.', Errores::ERROR_TBK);
                break;
            case -3:
                throw new Exception('Error en transacción.', Errores::ERROR_TBK);
                break;
            case -4:
                throw new Exception('Rechazo de transacción.', Errores::ERROR_TBK);
                break;
            case -5:
                throw new Exception('Rechazo por error de tasa.', Errores::ERROR_TBK);
                break;
            case -6:
                throw new Exception('Excede cupo máximo mensual.', Errores::ERROR_TBK);
                break;
            case -7:
                throw new Exception('Excede límite diario por transacción.', Errores::ERROR_TBK);
                break;
            case -8:
                throw new Exception('Rubro no autorizado.', Errores::ERROR_TBK);
                break;
            default:
                throw new Exception("No se reconoce el codigo.", Errores::ERROR_TBK);
        }
    }

    public static function getPaymentTypeCodeMessage($type){
        $message = '';
        switch ($type){
            case 'VD':
                $message = 'Venta Debito.';
                break;
            case 'VN':
                $message = 'Venta Normal.';
                break;
            case 'VC':
                $message = 'Venta en cuotas.';
                break;
            case 'SI':
                $message = '3 cuotas sin interés.';
                break;
            case 'S2':
                $message = '2 cuotas sin interés.';
                break;
            case 'NC':
                $message = 'N Cuotas sin interés.';
                break;
            default:
                throw new Exception("No se reconoce el tipo.");
        }
        return $message;
    }
    
    public static function getVCIMessage($vci){
        $message = '';
        switch ($vci){
            case 'TSY':
                $message = 'Autenticación exitosa.';
                break;
            case 'TSN':
                $message = 'autenticación fallida.';
                break;
            case 'TO':
                $message = 'Tiempo máximo excedido para autenticación.';
                break;
            case 'ABO':
                $message = 'Autenticación abortada por tarjetahabiente.';
                break;
            case 'U3':
                $message = 'Error interno en la autenticación.';
                break;
            default:
                throw new UserException("transacción no se autentico.", UserException::ERROR);
            
        }
        return $message;
    }
}
