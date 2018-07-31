<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PHPLogger
 *
 * @author enriq
 */
class PHPLogger {
    //put your code here
    
    const RUTA_ERROR_LOG = "/logs/errorLog/";
    const RUTA_TBK_LOG = "/logs/tbkLog/";
    
    const INFO = 1;
    const WARNING = 2;
    const ERROR = 3;
    
    const TBK_ENVIADO_WEBPAY = 1;
    const TBK_ENVIADO_COMERCIO = 2;
    const TBK_ANULADO = 3;
    const TBK_APROBADO = 4;
    const TBK_RECHAZADO = 5;
    const TBK_TIMEOUT = 6;
    const TBK_ERROR = 7;
    
    public static function LogError($mensaje, $codigo,$tipo, Exception $exception = null){
        $fecha = new DateTime();
        $rutaDoc = '/home/drysoft.com/public_html/'.self::RUTA_ERROR_LOG."error_".$fecha->format('Ymd').".log";
        $file = fopen($rutaDoc, "a");
        if($file == false)
            throw new Exception("Error al iniciar Log.");
        $contenido = "\r\n--------------------------------------------------\r\n";
        $tipoMsj = "";
        switch ($tipo){
            case self::INFO:
                $tipoMsj = "Informacion de sistema (INFO)";
                break;
            case self::WARNING:
                $tipoMsj = "Advertencia (WARNING)";
                break;
            case self::ERROR:
                $tipoMsj = "Error critico (ERROR)";
                break;
        }
        $contenido .= "Tipo de Mensaje: ".$tipoMsj."\r\n";
        $contenido .= "Fecha: ".$fecha->format('d/m/Y H:i:s')."\r\n";
        $contenido .= "Mensaje: ".$mensaje."\r\n";
        $contenido .= "Codigo: ".self::getErrorFromErrores($codigo)."\r\n";
        $contenido .= "Ruta Solicitud: ".$_SERVER['REQUEST_URI']."\r\n";
        $debug = array(
            'SESSION' => !empty($_SESSION) ? $_SESSION : "NO SESSION",
            'COOKIE'  => !empty($_COOKIE) ? $_COOKIE : "NO COOKIE",
            'POST'    => !empty($_POST) ? $_POST : "NO POST",
            'GET'     => !empty($_GET) ? $_GET : "NO GET",
            'SERVER'     =>  !empty($_SERVER) ? $_SERVER : "NO SERVER",
        ); 
        if($exception != null)
            $contenido .= "Exception: ".print_r ($exception,true);
        $contenido .= "HTTP Var: ".print_r($debug,true);
        $contenido .="\r\n--------------------------------------------------";
        fwrite($file,$contenido);
        fclose($file);
    }
    
    public static function LogTbk($mensaje,$tipo,$token,$objDisplay = null) {
        $fecha = new DateTime();
        $rutaDoc = '/home/drysoft.com/public_html/'.self::RUTA_TBK_LOG."tbk_".$fecha->format('Ymd').".log";
        $file = fopen($rutaDoc, "a");
        if($file == false)
            throw new Exception("Error al iniciar Log.");
        $contenido = "\r\n--------------------------------------------------\r\n";
        $contenido .= "Fecha: ".$fecha->format('d/m/Y H:i:s')."\r\n";
        $contenido .= "Mensaje: ".$mensaje."\r\n";
        $contenido .= "Token: ".$token."\r\n";
        $contenido .= "Ruta Solicitud: ".$_SERVER['REQUEST_URI']."\r\n";
        $debug = array(
            'SESSION' => !empty($_SESSION) ? $_SESSION : "NO SESSION",
            'COOKIE'  => !empty($_COOKIE) ? $_COOKIE : "NO COOKIE",
            'POST'    => !empty($_POST) ? $_POST : "NO POST",
            'GET'     => !empty($_GET) ? $_GET : "NO GET",
            'SERVER'     =>  !empty($_SERVER) ? $_SERVER : "NO SERVER",
        ); 
        $contenido .= "Estado: ".self::getTipoInteraccion($tipo)."\r\n";;
        if($objDisplay != null)
            $contenido .= "Datos TBK: ".print_r($objDisplay,true);
        $contenido .= "HTTP Var: ".print_r($debug,true);
        $contenido .="\r\n--------------------------------------------------";
        fwrite($file,$contenido);
        fclose($file);
    }
    
    private static function getErrorFromErrores($codError) {
        switch ($codError){
            case Errores::ERROR_BAD_REQUEST:
                return "Solicitud erronea";
                break;
            case Errores::ERROR_CONEXION_BD:
                return "Error de conexión a bd";
                break;
            case Errores::ERROR_NOT_FOUND:
                return "Elemento no encontrado";
                break;
            case Errores::ERROR_PERMISSION_DENIED:
                return "Permiso denegado";
                break;
            case Errores::ERROR_QUERY:
                return "Error en query";
                break;
            case Errores::ERROR_SINTAXIS:
                return "Error de sintaxis";
                break;
            case Errores::ERROR_TRANSMISION:
                return "Error en transmision";
                break;
            case Errores::WARNING_NO_CONTENT:
                return "Advertencia sin contenido";
                break;
                default :
                return "Error desconocido";
        }
    }
    
    private static function getTipoInteraccion($tipo){
        switch ($tipo){
            case self::TBK_ENVIADO_WEBPAY:
                return "Usuario enviado a webpay.";
                break;
            case self::TBK_ENVIADO_COMERCIO:
                return "Usuario enviado a comercio.";
                break;
            case self::TBK_ANULADO:
                return "Usuario anula transaccion.";
                break;
            case self::TBK_APROBADO:
                return "TransBank aprueba transaccion.";
                break;
            case self::TBK_RECHAZADO:
                return "TransBank rechaza transaccion.";
                break;
            case self::TBK_TIMEOUT:
                return "Tiempo de espera superado.";
                break;
            case self::TBK_ERROR:
                return "Error inesperado.";
                break;
            default :
                return "Interaccion desconocida.";
        }
    }
}
