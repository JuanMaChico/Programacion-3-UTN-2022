<?php

require_once ("AccesoDatosStr.php");

class PizzaDatosJSON{

  //JSON

    public static function PizzasToJson($pizzas, $nombreArchivo){
        $strJson = json_encode($pizzas);
        return AccesoDatosStr::GuardarStr($strJson,$nombreArchivo);
    }

    public static function JsonToPizzas($nombreArchivo){
        $pizzasJson = array();
        $strArchivo = AccesoDatosStr::AbrirStr($nombreArchivo);
        if ($strArchivo != ""){
            $pizzasJson = json_decode($strArchivo);
            
        }

        return array_map(function ($o) {  return new Pizza($o->_id, $o->_sabor, $o->_precio, $o->_tipo, $o->_cantidad);}, $pizzasJson);
        
    }



}

?>