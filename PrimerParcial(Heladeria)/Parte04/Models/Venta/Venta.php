<?php

//Modelo de la venta.
class Venta
{
    public $email;
    public $sabor;
    public $tipo;
    public $cantidad;
    public $foto;
    public $fecha;

    public function __construct($email, $sabor, $tipo, $cantidad, $foto)
    {
        $this->email = $email;
        $this->sabor = $sabor;
        $this->tipo = $tipo;
        $this->cantidad = $cantidad;
        $this->foto = $foto;
        $this->fecha = date("Y-m-d H:i:s");
    }
}
