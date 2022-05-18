<?php

/**
 * @version: Modelo de Pizza
 * 
 * @author Juan Manuel Chico 3`C
 * 
 * @param string $sabor
 * @param string $tipo
 * @param float $precio
 * @param int $cantidad
 */
class Pizza
{
    public $_sabor;
    public $_precio;
    public $_tipo;
    public $_cantidad;

    public function __construct($sabor, $tipo,  $precio, $cantidad)
    {
        $this->_sabor = $sabor;
        $this->_tipo = $tipo;
        $this->_precio = $precio;
        $this->_cantidad = $cantidad;
    }

    public function __toString()
    {
        return $this->_sabor . " " . $this->_tipo . " " . $this->_precio . " " . $this->_cantidad;
    }

    public static function guardarEnJson($pizza)
    {
        return var_dump($pizza);
    }
}