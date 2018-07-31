<?php

require_once(Link::include_file('clases/utilidad/DBO.php'));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Factura
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Factura extends DBO{
    
    const ESTADO_CREADO = 1;
    const ESTADO_PENDIENTE = 2;
    const ESTADO_CANCELADO = 3;
    const ESTADO_PAGADO = 4;
    
    private $id;
    private $token_carrito;
    private $detalle;
    private $monto;
    private $fecha_creacion;
    private $id_usuario;
    private $token_tbk;
    private $carrito;
    
    
    //adicionales?  
    private $rut;
    private $razon;
    private $direccion;
    private $comuna;
    private $provincia;
    private $ciudad;
    private $region;
    private $giro;
    private $telefono;
    private $email;
    private $orden_compra;
    
    //necesario?
    private $estado;
    
    function getId() {
        return $this->id;
    }

    function getToken_carrito() {
        return $this->token_carrito;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function getMonto() {
        return $this->monto;
    }

    function getFecha_creacion() {
        return $this->fecha_creacion;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setToken_carrito($token_carrito) {
        $this->token_carrito = $token_carrito;
    }

    function setDetalle($detalle) {
        $this->detalle = $detalle;
    }

    function setMonto($monto) {
        $this->monto = $monto;
    }

    function setFecha_creacion($fecha) {
        $this->fecha_creacion = $fecha;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function getToken_tbk() {
        return $this->token_tbk;
    }

    function setToken_tbk($token_tbk) {
        $this->token_tbk = $token_tbk;
    }
    
    function getCarrito() {
        return $this->carrito;
    }

    function setCarrito($carrito) {
        $this->carrito = $carrito;
    }
    
    function getRut() {
        return $this->rut;
    }

    function getRazon() {
        return $this->razon;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getComuna() {
        return $this->comuna;
    }

    function getRegion() {
        return $this->region;
    }

    function getGiro() {
        return $this->giro;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getEstado() {
        return $this->estado;
    }

    function setRut($rut) {
        $this->rut = str_replace(array(".","-"), "", $rut);
    }

    function setRazon($razon) {
        $this->razon = $razon;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setComuna($comuna) {
        $this->comuna = $comuna;
    }

    function setRegion($region) {
        $this->region = $region;
    }

    function setGiro($giro) {
        $this->giro = $giro;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }
    
    function getOrden_compra() {
        return $this->orden_compra;
    }

    function setOrden_compra($orden_compra) {
        $this->orden_compra = $orden_compra;
    }

    
    public function toArray() {
        $array = array();
        foreach ($this as $key => $value) {
            $array[$key] = ($key == 'producto') ? $value->toArray() : $value;
        }
        return $array;
    }
            
    
            //put your code here
}
