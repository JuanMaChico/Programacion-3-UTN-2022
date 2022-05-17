<?php



include_once "venta.php";
$fecha = date("Y-m-d");

$nuevaVenta = new Venta("", $_POST["mail"], "", $_POST["sabor"], $_POST["tipo"], $_POST["cantidad"],  $fecha);

if ($nuevaVenta->RealizarVenta($_FILES["foto"]["tmp_name"])){
    echo "Venta realizada";
} else {
    echo "Venta no realizada";
} 

?>