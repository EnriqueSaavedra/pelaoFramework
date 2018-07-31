<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Usuario {
    private $id;
    private $email;
    private $rut;
    private $empresa;
    private $token;
    private $pass;
    
    function __construct() {
        
    }

    
    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getRut() {
        return $this->rut;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function getToken() {
        return $this->token;
    }

    function getPass() {
        return $this->pass;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    function setToken($token) {
        $this->token = $token;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    public function toArray() {
        $array = array();
        foreach ($this as $key => $value) {
            $array[$key] = $value;
        }
        return $array;
    }
}
