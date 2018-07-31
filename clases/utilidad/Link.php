<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Link
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Link {
    const DIR_ROOT = './index.php';
    
    const DIR_BASE = 'app/PUBLIC/';
    const PROJECT_NAME = '';
    
    const CTX_ACCESO_PUBLICO = 'PUBLIC';
    public $ctx;
    public $app;
    public $params;
    
    public function __construct($ctx,$app,$params) {
        $this->ctx = $ctx;
        $this->app = $app;
        $this->params = $params;
    }
    
    private function verificarPermiso() {
        if(!isset($_SESSION['USUARIO']['CTX'])){
            $this->ctx = 'PUBLIC';
            $this->app = 'home';
            $this->params = null;
        }else{
            if( $this->ctx != $_SESSION['USUARIO']['CTX']){
                if($this->ctx != self::CTX_ACCESO_PUBLICO){
                    $this->ctx = $_SESSION['USUARIO']['CTX'];
                    $this->app = 'home';
                    $this->params = null;
                }
            }
        }
    }
    
    public static function redirectExternal($url){
        header('Location: '.$url);
        die();
    }

    public static function redirect($ctx = null,$app = null,$params = null){  
        $link = new Link($ctx,$app,$params);
        if(empty($ctx) || empty($app)){
            header('Location: ?ctx=PUBLIC&app=home');
            exit();
        }
        if($ctx !== self::CTX_ACCESO_PUBLICO)
            $link->verificarPermiso();
        if(empty($link->params)){
            header('Location: ?ctx='.$link->ctx.'&app='.$link->app);
            exit();
        }else{
            $header = 'Location: ?ctx='.$link->ctx.'&app='.$link->app;
            foreach ($link->params as $key => $value) {
                $header .= "&$key=$value";
            }
            header($header);
            exit();
        }
    }
    
    public static function getRuta($ctx = null,$app = null, $ext = "php") {
        $link = new Link($ctx,$app,null);
        if(empty($ctx) && empty($app))
            return 'app/PUBLIC/home.php';
        if($ctx != 'PUBLIC')
            $link->verificarPermiso();
        if($ext == "php")
            return 'app/'.$link->ctx.'/'.$link->app.'.php';
        elseif($ext == "html")
            return 'app/'.$link->ctx.'/'.$link->app.'.html';
    }
    
    public static function getRutaHref($ctx = null,$app = null,$params = null) {
        if(empty($ctx) && empty($app))
            return './index.php?ctx=PUBLIC&app=home';
        if(empty($ctx) && !empty($app))
            return './index.php?ctx=PUBLIC&app='.$app;
        if($params == null){
            return './index.php?ctx='.$ctx.'&app='.$app;
        }else{
            $URL = './index.php?ctx='.$ctx.'&app='.$app;
            foreach ($params as $key => $value) {
                $URL .= "&$key=$value";
            }
            return $URL;
        }
    }

    public static function include_file($rutaRelativa){
        return '/home/drysoft.com/public_html/'.$rutaRelativa;
    }

    
}
