<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logger
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Debuger {
    const FILE_DIR = "config/debug.ini";
    private $debugMode = false;
    public function __construct() {
        $array_ini = parse_ini_file(Link::include_file(self::FILE_DIR),true);
        $this->debugMode = $array_ini["debug"]["debug"];
    }
    
    public function isDebug(){
        return $this->debugMode;
    }
}
