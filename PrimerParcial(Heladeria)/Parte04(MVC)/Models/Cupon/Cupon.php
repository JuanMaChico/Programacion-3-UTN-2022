<?php
//Modelo del Cupon de descuento
class Cupon
{
    public $id;
    public $devolucion_id;
    public $porcentajeDescuento;
    public $estado;

    public function __construct($id, $devolucion_id, $porcentajeDescuento, $estado)
    {
        $this->id = $id;
        $this->devolucion_id = $devolucion_id;
        $this->porcentajeDescuento = $porcentajeDescuento;
        $this->estado = $estado;
    }
}
