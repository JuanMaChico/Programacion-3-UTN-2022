<?php
//venta

// 3-

// a- (1 pts.) AltaVenta.php: (por POST) se recibe el email del usuario y el Sabor, Tipo y Stock, si el ítem existe en
// heladeria.json, y hay stock guardar en la base de datos( con la fecha, número de pedido y id autoincremental ) .
// Se debe descontar la cantidad vendida del stock.

// b- (1 pt) Completar el alta de la venta con imagen de la venta (ej:una imagen del usuario), guardando la imagen
// con el sabor+tipo+mail(solo usuario hasta el @) y fecha de la venta en la carpeta /ImagenesDeLaVenta.

include_once "Heladeria.php";

echo "Mail: " . $_POST["mail"] . "<br>";
echo "Tipo: " . $_POST["tipo"] . "<br>";
echo "Sabor: " . $_POST["sabor"] . "<br>";
echo "Stock: " . $_POST["stock"] . "<br>";

echo "<br><br>";

Heladeria::VenderHelado($_POST["mail"], $_POST["sabor"], $_POST["tipo"], $_POST["stock"]);
