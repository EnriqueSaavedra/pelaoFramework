<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HtmlUtiles
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class HtmlUtiles {
    
    public static function redireccionarAccesoDenegado($mensaje) {
        echo "<script>
                    location.href = '".Link::getRutaHref("PUBLIC", "home", array("message" => $mensaje))."';
                </script>";
    }
    
    public static function generarSelectPicker($lista,$id = null,$nombre = null,$class = null,$valueDefaul = null){
        if(empty($id))
           $id = "";
        else
            $id = "id='$id'";
        
        if(empty($class))
            $class = "";
        
        if(empty($nombre))
            $nombre = "";
        else
            $nombre = "name='$nombre'";
        
        
        $select = "<select class='form-control selectpicker $class' $nombre data-live-search='true' $id >";
        if(empty($valueDefaul))
                $select.= "<option selected='selected' value='0'>Seleccione..</option>";
        
        if(empty($lista))
            return $select."</select>"; 
        foreach ($lista as $key => $value) {
            if(!empty($valueDefaul) && $key == $valueDefaul)
                $select.="<option selected='selected'  value='$key'>$value</option>";
            else
                $select.="<option value='$key'>$value</option>";
        }
        
        $select .= "</select>";
        return $select;
        
    }
    //put your code here
}
