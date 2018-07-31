<?php

require_once(Link::include_file('clases/utilidad/DBO.php'));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Comuna extends DBO{
    private $id;
    private $nombre;
    private $id_provincia;

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getId_provincia() {
        return $this->id_provincia;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = utf8_encode($nombre);
    }

    function setId_provincia($id_provincia) {
        $this->id_provincia = $id_provincia;
    }

    public function toArray() {
        $array = array();
        foreach ($this as $key => $value) {
            $array[$key] =  utf8_encode($value);
        }
        return $array;
    }
}

class Region extends DBO{
    private $id;
    private $nombre;
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = utf8_encode($nombre);
    }

    public function toArray() {
        $array = array();
        foreach ($this as $key => $value) {
            $array[$key] =  utf8_encode($value);
        }
        return $array;
    }

}

class Provincia extends DBO{
    private $id;
    private $nombre;
    private $id_region;
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getId_region() {
        return $this->id_region;
    }

     function setId($id) {
        $this->id = $id;
    }

     function setNombre($nombre) {
        $this->nombre = utf8_encode($nombre);
    }

     function setId_region($id_region) {
        $this->id_region = $id_region;
    }
    
    public function toArray() {
        $array = array();
        foreach ($this as $key => $value) {
            $array[$key] =  utf8_encode($value);
        }
        return $array;
    }
}

?>