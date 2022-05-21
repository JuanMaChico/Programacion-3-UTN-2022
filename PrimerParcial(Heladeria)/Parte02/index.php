<?php

// 4- (1 pts.)ConsultasVentas.php: (por GET)
// Datos a consultar:
// a- La cantidad de Helados vendidos en un día en particular(se envía por parámetro), si no se pasa fecha, se
// muestran las del día de ayer.
// b- El listado de ventas de un usuario ingresado.
// c- El listado de ventas entre dos fechas ordenado por nombre.
// d- El listado de ventas por sabor ingresado.
// 5- (1 pts.) ModificarVenta.php (por PUT)
// Debe recibir el número de pedido, el email del usuario, el nombre, tipo y cantidad, si existe se modifica , de lo
// contrario informar que no existe ese número de pedido.


//Evaluamos el metodo
switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        switch (key($_POST)) {
            case 'HeladeriaAlta':
                include_once "HeladeriaAlta.php";
                break;
            case 'HeladoConsultar':
                include_once "HeladoConsultar.php";
                break;
            case 'AltaVenta':
                include_once "AltaVenta.php";
                break;
            default:
                echo "Peticion POST No Soportada...";
                break;
        }
        break;
    case "GET":
        switch (key($_GET)) {
            case 'ConsultasVentas':
                echo "<br><br> Consulta ventas <br><br>";
                include_once "ConsultaVentas.php";
                break;
        }
        break;
    case "PUT":
        switch (key($_REQUEST)) {
            case 'ModificarVenta':
                include_once "ModificarVenta.php";
                break;
        }
        break;
    default:
        echo "Peticion GET No Soportada...";
        break;
}
