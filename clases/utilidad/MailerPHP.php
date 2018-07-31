<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MailerPHP
 *
 * @author enriq
 */
class MailerPHP {
    const FILE_DIR = "config/database.ini";
    
    private $sender;
    public function __construct() {
        $array_ini = parse_ini_file(Link::include_file(self::FILE_DIR),true);
        $this->sender = $array_ini["email"]["sender_mail"];
    //leer email
    }

    public function enviarMailTBKRechazo($email,$datos){
        $para      = $email;
        $titulo    = 'Transaccion Rechazada N°: '.$datos['OrdenCompra'];
        $mensaje   = 'Lo sentimo';
        $this->enviarMail($email, $titulo, $mensaje);
    }

    public function enviarMailTBKAprobado($email, Factura $factura){
        $para      = $email;
        $titulo    = 'Transaccion Aprobada N°: '.$factura->getOrden_compra();
        $mensaje   = 'felicidades';
        $this->enviarMail($email, $titulo, $mensaje);
    }
    private function enviarMail($email,$titulo,$mensaje) {
        $cabeceras = 'From: '. $this->sender . "\r\n" .
            'Reply-To: ' . $this->sender . "\r\n" .
            'Content-Type: text/html; charset=ISO-8859-1\r\n'.
            'X-Mailer: PHP/' . phpversion();
        mail($para, $titulo, $mensaje, $cabeceras);
    }
    //put your code here
}
