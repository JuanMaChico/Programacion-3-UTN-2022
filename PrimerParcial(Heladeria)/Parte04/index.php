<?php

//Index de la API
//Wrapper de la API

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
        include_once "ConsultaVentas.php";
        break;

    case "PUT":
        include_once "ModificarVenta.php";
        break;

    case "DELETE":
        include_once "BorrarVentas.php";
        break;

    default:
        echo "Peticion No Soportada...";
        break;
}
