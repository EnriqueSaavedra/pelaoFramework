<?php

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
class Producto {
    private $id;
    private $nombre;
    private $alcance;
    private $ruta_imagen;
    private $descripcion;
    private $monto;
    private $activo;
    
    //Adicionales
    
    private $montoOferta;
    private $porcentajeOferta;
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getAlcance() {
        return $this->alcance;
    }

    function getRuta_imagen() {
        return $this->ruta_imagen;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getMonto() {
        return $this->monto;
    }

    function getActivo() {
        return $this->activo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setAlcance($alcance) {
        $this->alcance = $alcance;
    }

    function setRuta_imagen($ruta_imagen) {
        $this->ruta_imagen = $ruta_imagen;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setMonto($monto) {
        $this->monto = $monto;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function getMontoOferta() {
        return $this->montoOferta;
    }

    function getPorcentajeOferta() {
        return $this->porcentajeOferta;
    }

    function setMontoOferta($montoOferta) {
        $this->montoOferta = $montoOferta;
    }

    function setPorcentajeOferta($porcentajeOferta) {
        $this->porcentajeOferta = $porcentajeOferta;
    }

    public function toArray() {
        $array = array();
        foreach ($this as $key => $value) {
            $array[$key] = $value;
        }
        return $array;
    }
}
