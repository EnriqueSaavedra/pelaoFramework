<?php
require_once(Link::include_file('clases/BDconn.php'));
require_once(Link::include_file('clases/DBO/Usuario.php'));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class UsuarioDAO extends BDconn{
    
    const SESSION_EMAIL = "email";
    const SESSION_TOKEN = "token";
    const SESSION_EMPRESA = "empresa";
    const SESSION_RUT = "rut";
    const SESSION_ID = "id";
    const SESSION_CARRITO = "carrito";
    
    function __construct() {
        parent::__construct();
    }
    
    public function loginUser($email,$pass) {
        try {
            $passSecure = md5($pass);
            $consulta = $this->pdo->prepare("SELECT * FROM usuario WHERE email = :email AND pass = :pass");
            $boolRes = $consulta->execute(array(
                "email" => $email,
                "pass" => $passSecure
            ));
            if(!$boolRes)
                throw new Exception ("Error en datos de usuario.", Errores::ERROR_BAD_REQUEST);
            /*@var $usuario Usuario*/
            $usuario = $consulta->fetchObject("Usuario");
            if(!$usuario)
                throw new Exception("Usuario incorrecto.", Errores::WARNING_NO_CONTENT);
            $this->cargarSession($usuario);
        } catch (PDOException $exc){
            throw new Exception("Problemas al realizar validaciones.", Errores::ERROR_QUERY);
        }
    }
    
    /**
     * 
     * @param int $id
     * @return Usuario
     * @throws Exception
     * @throws PDOException
     */
    public function getUserById($id) {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM usuario WHERE id = :id;");
            $consulta->execute(array(
                "id" => $id
            ));
            if(!$consulta)
                return null;
            return $consulta->fetchObject("Usuario");
        }catch(PDOException $exc){
            throw new Exception("Problemas al realizar validaciones.", Errores::ERROR_QUERY);
        }

        
    }


    public function usuarioExiste($email){
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM usuario WHERE email = :email;");
            $consulta->execute(array(
                "email" => $email
            ));
            if(!$consulta)
                return false;
            $usuario = $consulta->fetchObject("Usuario");
            if($usuario)
                return true;
            else
                return false;
        }catch(PDOException $exc){
            throw new Exception("Problemas al buscar usuario.", Errores::ERROR_QUERY);
        }
    }
    
    /**
     * 
     * @param String $email
     * @param String $pass
     * @param String $rut
     * @param String $empresa
     * @return Usuario
     * @throws Exception
     * @throws PDOException
     */
    public function createNewUser($email,$pass,$rut,$empresa) {
        try {
            $passSecure = md5($pass);
            $empresa = (empty($empresa) || $empresa == '0' || $empresa == 0) ? false : true;
            $rut = $this->limpiarRut($rut);
            $token = "";
            $this->pdo->beginTransaction();
            $exec = $this->pdo->prepare("INSERT INTO usuario (email,rut,empresa,pass,token)VALUES(:email,:rut,:empresa,:pass,:token);");
            $result = $exec->execute(array(
                "email" => $email,
                "rut" => $rut,
                "empresa" => ($empresa == "" ? "0" : "1"),
                "pass" => $passSecure,
                "token" => $token
            ));
            $usuario = $this->getUserById($this->pdo->lastInsertId());
            if($usuario == null)
                throw new Exception("Imposible obtener usuario, intente nuevamente.", Errores::WARNING_NO_CONTENT);
            $this->cargarSession($usuario);
            $this->pdo->commit();      
            return $usuario;
        } catch (PDOException $exc) {
            $this->pdo->rollBack();
            throw new Exception("Problemas al realizar validaciones.",Errores::ERROR_QUERY);
        }
    }
    
    /**
     * 
     * @param Usuario $usuario
     */
    private function cargarSession($usuario) {
       session_start();
       $_SESSION["USER"][self::SESSION_ID] = $usuario->getId();
       $_SESSION["USER"][self::SESSION_EMAIL] = $usuario->getEmail();
       $_SESSION["USER"][self::SESSION_EMPRESA] = $usuario->getEmpresa();
       $_SESSION["USER"][self::SESSION_RUT] = $usuario->getRut();
       $_SESSION["USER"][self::SESSION_TOKEN] = $usuario->getToken(); 
    }
    
    private function limpiarRut($rut){
        $search = array(".","-");
        $rut = str_replace($search, "", $rut);
        $rut = substr($rut, 0,(strlen($rut)-1));
        return $rut;
    }
    
    
}

