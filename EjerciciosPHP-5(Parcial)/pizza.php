<?php



class Pizza
{
    private string $_sabor;
    private string $_tipo;
    private float $_precio;
    private int $_cantidad;

    public function __construct(string $sabor, string $tipo, float $precio, int $cantidad)
    {
        $this->_sabor = $sabor;
        $this->_tipo = $tipo;
        $this->_precio = $precio;
        $this->_cantidad = $cantidad;
    }

    

}