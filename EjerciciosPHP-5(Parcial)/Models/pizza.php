<?php



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
}