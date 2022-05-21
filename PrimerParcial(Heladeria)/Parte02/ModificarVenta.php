<?php
//Modificar Venta
include_once "Heladeria.php";

//Consigna:
// 5- (1 pts.) ModificarVenta.php (por PUT)
// Debe recibir el número de pedido, el email del usuario, el sabor, tipo y cantidad, si existe se modifica , de lo
// contrario informar que no existe ese número de pedido.


$ModificarVenta = Heladeria::ModificarVentaSql($_REQUEST["id"], $_REQUEST["email"], $_REQUEST["sabor"], $_REQUEST["tipo"], $_REQUEST["cantidad"]);
