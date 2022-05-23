<?php
//Consulta Ventas

// Enunciado:
// 4- (1 pts.)ConsultasVentas.php: (por GET)
// Datos a consultar:
// a- La cantidad de Helados vendidos en un día en particular(se envía por parámetro(fecha)), 
// si no se pasa fecha, se muestran las del día de anterior.
// b- El listado de ventas de un usuario ingresado.
// c- El listado de ventas entre dos fechas ordenado por nombre.
// d- El listado de ventas por sabor ingresado.

//Libreridas
include_once "Heladeria.php";


$ventas = Heladeria::ConsultaVentasSql($_GET["fecha"]);

if ($ventas != null && sizeof($ventas) > 0) {
    echo "<br>";
    echo "<h3>Ventas por dia</h3>";
    foreach ($ventas as $key => $value) {
        echo "Id: " . $value["id"] . "<br>";
        echo "Sabor: " . $value["sabor"] . "<br>";
        echo "Tipo: " . $value["tipo"] . "<br>";
        echo "Cantidad: " . $value["stock"] . "<br>";
        echo "Fecha: " . $value["fecha"] . "<br>";
        echo "Email: " . $value["email"] . "<br>";
        echo "------------------------------<br>";
    }
} else {
    echo "<br>No hay ventas para esa fecha<br>";
}


$ventasUsuario = Heladeria::ConsultaVentasPorUsuarioSql($_GET["email"]);

if ($ventasUsuario != null && sizeof($ventasUsuario) > 0) {
    echo "<br>";
    echo "<br><h3>Ventas por Usuario</h3><br>";
    foreach ($ventasUsuario as $key => $value) {
        echo "Id: " . $value["id"] . "<br>";
        echo "Sabor: " . $value["sabor"] . "<br>";
        echo "Tipo: " . $value["tipo"] . "<br>";
        echo "Cantidad: " . $value["stock"] . "<br>";
        echo "Fecha: " . $value["fecha"] . "<br>";
        echo "Email: " . $value["email"] . "<br>";
        echo "------------------------------<br>";
    }
} else {
    echo "<br>No hay ventas para ese usuario<br>";
}



$desdeHasta = Heladeria::ConsultaVentasDesdeHastaSql($_GET["fechadesde"], $_GET["fechahasta"]);

if ($desdeHasta != null && sizeof($desdeHasta) > 0) {
    echo "<br>";
    echo "<br><h3>Ventas Desde -> Hasta</h3><br>";
    foreach ($desdeHasta as $key => $value) {
        echo "Id: " . $value["id"] . "<br>";
        echo "Sabor: " . $value["sabor"] . "<br>";
        echo "Tipo: " . $value["tipo"] . "<br>";
        echo "Cantidad: " . $value["stock"] . "<br>";
        echo "Fecha: " . $value["fecha"] . "<br>";
        echo "Email: " . $value["email"] . "<br>";
        echo "------------------------------<br>";
    }
} else {
    echo "<br>No hay ventas para ese Periodo<br>";
}


$ventasporsabor = Heladeria::ConsultaVentasPorSaborSQL($_GET["sabor"]);

if ($ventasporsabor != null && sizeof($ventasporsabor) > 0) {
    echo "<br>";
    echo "<br><h3>Ventas Por Sabor</h3><br>";
    foreach ($ventasporsabor as $key => $value) {
        echo "Id: " . $value["id"] . "<br>";
        echo "Sabor: " . $value["sabor"] . "<br>";
        echo "Tipo: " . $value["tipo"] . "<br>";
        echo "Cantidad: " . $value["stock"] . "<br>";
        echo "Fecha: " . $value["fecha"] . "<br>";
        echo "Email: " . $value["email"] . "<br>";
        echo "------------------------------<br>";
    }
} else {
    echo "<br>No hay ventas para ese Periodo<br>";
}
