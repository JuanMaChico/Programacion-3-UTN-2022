<?php
//Wrapper de la API
//Validara con que metodo se esta accediendo y que debemos hacer
switch ($_SERVER["REQUEST_METHOD"]) {

    case "POST":
        switch (key($_POST)) {
            case 'HeladeriaAlta':
                include_once "./Views/AltaHeladeria.php";
                break;
            case 'HeladoConsultar':
                include_once "./Views/ConsultarHelado.php";
                break;
            case 'AltaVenta':
                include_once "./Views/AltaVenta.php";
                break;
            case 'DevolverHelado':
                include_once "./Views/DevolverHelado.php";
                break;
            default:
                echo "Peticion POST No Soportada...";
                break;
        }
        break;

    case "GET":
        include_once "./Views/ConsultaVentas.php";
        break;

    case "PUT":
        include_once "./Views/ModificarVenta.php";
        break;

    case "DELETE":
        include_once "./Views/BorrarVentas.php";
        break;

    default:
        echo "Peticion No Soportada...";
        break;
}
