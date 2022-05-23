<?php

// 8- (2 pts.) AltaVenta.php, ...( continuación de 1ra parte, punto 3) Todo lo anterior más...
// a- Debe recibir el cupón de descuento (si existe) y guardar el importe final y el descuento aplicado en el archivo.
// b- Debe marcarse el cupón como ya usado.

// 9- (2 pts.) ConsultasDevoluciones.php:-
// a- Listar las devoluciones con cupones.
// b- Listar solo los cupones y su estado.
// c- Listar devoluciones y sus cupones y si fueron usados 


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
            case 'DevolverHelado':
                include_once "DevolverHelado.php";
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
    case "DELETE":
        include_once "BorrarVentas.php";
        break;
    default:
        echo "Peticion No Soportada...";
        break;
}
