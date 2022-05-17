<?php

include_once "venta.php";

if(Venta::BorrarVenta($_REQUEST["numPedido"])){
    echo "Venta borrada";
} else {
    echo "No se pudo borrar la venta";
}

?>