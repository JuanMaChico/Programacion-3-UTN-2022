<?php



include_once "venta.php";

$fecha = date("y-m-d");
$ventaModificada = new Venta($_REQUEST["numpedido"], $_REQUEST["mail"], "", $_REQUEST["sabor"], $_REQUEST["tipo"], $_REQUEST["cantidad"], $fecha, "");

if ($ventaModificada->ModificarVenta()){
    echo "Modificacion realizada";
} else {
    echo "No se pudo modificar";
}

?>