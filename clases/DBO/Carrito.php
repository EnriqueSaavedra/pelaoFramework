<?php

require_once(Link::include_file('clases/utilidad/DBO.php'));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carrito
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Carrito extends DBO{
    private $token;
    private $id_usuario;
    private $id_prod;
    private $cantidad;
    private $fecha;
    
   /**
    *
    * @var Producto
    */
    private $producto;
    
    
    function getProducto() {
        return $this->producto;
    }

    function setProducto(Producto $producto) {
        $this->producto = $producto;
    }

            
    function getToken() {
        return $this->token;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_prod() {
        return $this->id_prod;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setToken($token) {
        $this->token = $token;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_prod($id_prod) {
        $this->id_prod = $id_prod;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    
    public function toArray() {
        $array = array();
        foreach ($this as $key => $value) {
            $array[$key] = ($key == 'producto') ? $value->toArray() : $value;
        }
        return $array;
    }
}
