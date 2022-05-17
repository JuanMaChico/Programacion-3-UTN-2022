<?php

include_once "venta.php";

echo Venta::MostrarCantidadPizzasVendidas();
echo Venta::MostrarVentasEntreFechasOrdenadasPorSabor($_POST["fechaDesde"], $_POST["fechaHasta"]);
echo Venta::MostrarVentasDeUnUsuario($_POST["usuario"]);
echo Venta::MostrarVentasDeUnSabor($_POST["sabor"]);


?>